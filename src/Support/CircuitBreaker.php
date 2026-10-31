<?php

namespace spkm\IsamsApi\Support;

use Illuminate\Support\Facades\Cache;

class CircuitBreaker
{
    public function __construct(private readonly string $name) {}

    public static function for(string $baseUrl): self
    {
        return new self(sha1($baseUrl));
    }

    public static function enabled(): bool
    {
        return (bool) config('isams-api.circuit_breaker.enabled');
    }

    public function isOpen(): bool
    {
        return Cache::get($this->key('open_until'), 0) > now()->getTimestamp();
    }

    /**
     * Counts a failure, opening the circuit once there have been enough within the window (or straight away when it has
     * just closed after tripping). The count is atomic, so workers failing at the same moment are all counted.
     */
    public function recordFailure(): void
    {
        $key = $this->key('failures');
        $failures = Cache::add($key, 1, (int) config('isams-api.circuit_breaker.window_seconds', 60)) ? 1 : (int) Cache::increment($key);

        if (Cache::has($this->key('tripped')) || $failures >= (int) config('isams-api.circuit_breaker.failures', 5)) {
            $cooldown = (int) config('isams-api.circuit_breaker.cooldown_seconds', 60);
            Cache::put($this->key('open_until'), now()->addSeconds($cooldown)->getTimestamp(), $cooldown);
            Cache::put($this->key('tripped'), true, $cooldown * 10);
            Cache::forget($key);
        }
    }

    public function recordSuccess(): void
    {
        if (Cache::has($this->key('failures')) || Cache::has($this->key('tripped'))) {
            Cache::forget($this->key('failures'));
            Cache::forget($this->key('tripped'));
        }
    }

    private function key(string $suffix): string
    {
        return 'isams-api.breaker.'.$this->name.'.'.$suffix;
    }
}
