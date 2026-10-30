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

    public function recordFailure(): void
    {
        $failures = Cache::get($this->key('failures'), 0) + 1;

        if (Cache::has($this->key('tripped')) || $failures >= (int) config('isams-api.circuit_breaker.failures', 5)) {
            $cooldown = (int) config('isams-api.circuit_breaker.cooldown_seconds', 60);
            Cache::put($this->key('open_until'), now()->addSeconds($cooldown)->getTimestamp(), $cooldown);
            Cache::put($this->key('tripped'), true, $cooldown * 10);
            Cache::forget($this->key('failures'));

            return;
        }

        Cache::put($this->key('failures'), $failures, (int) config('isams-api.circuit_breaker.window_seconds', 60));
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
