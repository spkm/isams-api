<?php

namespace spkm\IsamsApi\Batch;

use DateTimeInterface;
use InvalidArgumentException;
use Stringable;

final class BatchFilters implements Stringable
{
    /** @var list<string> */
    private array $methods = [];

    /** @var array<string, array<string, array<string, mixed>>> */
    private array $filters = [];

    public static function make(): self
    {
        return new self;
    }

    public function methods(string ...$methods): self
    {
        $this->methods = [...$this->methods, ...array_values($methods)];

        return $this;
    }

    /**
     * @param  array<string, DateTimeInterface|bool|int|string|list<int|string>>  $attributes
     */
    public function filter(string $module, string $method, array $attributes): self
    {
        foreach ([$module, $method, ...array_keys($attributes)] as $name) {
            if (! preg_match('/^[A-Za-z_]\w*$/', $name)) {
                throw new InvalidArgumentException('"'.$name.'" is not a Batch API filter name.');
            }
        }

        $this->filters[$module][$method] = $attributes;

        return $this;
    }

    public function toXml(): string
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?><Filters>';

        if ($this->methods !== []) {
            $xml .= '<MethodsToRun>'.implode('', array_map(fn (string $method) => '<Method>'.$this->escape($method).'</Method>', $this->methods)).'</MethodsToRun>';
        }

        foreach ($this->filters as $module => $methods) {
            $xml .= "<$module>";

            foreach ($methods as $method => $attributes) {
                $xml .= "<$method";

                foreach ($attributes as $name => $value) {
                    $xml .= " $name=\"".$this->escape($this->value($value)).'"';
                }

                $xml .= '/>';
            }

            $xml .= "</$module>";
        }

        return $xml.'</Filters>';
    }

    public function __toString(): string
    {
        return $this->toXml();
    }

    private function value(mixed $value): string
    {
        return match (true) {
            $value instanceof DateTimeInterface => $value->format('Y-m-d'),
            is_bool($value) => $value ? 'true' : 'false',
            is_array($value) => implode(',', $value),
            default => (string) $value,
        };
    }

    private function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }
}
