<?php

namespace spkm\IsamsApi\Support;

use DateTimeInterface;
use InvalidArgumentException;
use Stringable;

final class Filter implements Stringable
{
    private const OPERATORS = ['eq', 'ne', 'gt', 'ge', 'lt', 'le'];

    private const LARAVEL_OPERATORS = ['=' => 'eq', '!=' => 'ne', '<>' => 'ne', '>' => 'gt', '>=' => 'ge', '<' => 'lt', '<=' => 'le'];

    /** @var list<string> */
    private array $clauses = [];

    public static function where(string $property, string $operator, mixed $value): static
    {
        return (new self)->and($property, $operator, $value);
    }

    public function and(string $property, string $operator, mixed $value): static
    {
        if (! in_array($operator, self::OPERATORS, true) && ! isset(self::LARAVEL_OPERATORS[$operator])) {
            throw new InvalidArgumentException('iSAMS filters only support =, !=, <>, >, >=, < and <=, or eq, ne, gt, ge, lt and le, not "'.$operator.'".');
        }

        $operator = self::LARAVEL_OPERATORS[$operator] ?? $operator;

        $this->clauses[] = ucfirst($property).' '.$operator.' '.$this->format($value);

        return $this;
    }

    public function __toString(): string
    {
        return implode(' and ', $this->clauses);
    }

    private function format(mixed $value): string
    {
        return match (true) {
            $value === null => 'null',
            is_bool($value) => $value ? 'true' : 'false',
            is_int($value), is_float($value) => (string) $value,
            $value instanceof DateTimeInterface => "datetime'".$value->format($value->format('His') === '000000' ? 'Y-m-d' : 'Y-m-d\TH:i:s')."'",
            default => "'".str_replace("'", "''", (string) $value)."'",
        };
    }
}
