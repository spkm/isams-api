<?php

namespace spkm\IsamsApi\Data;

use BackedEnum;
use Carbon\CarbonImmutable;
use Carbon\Exceptions\InvalidFormatException;
use DateTimeInterface;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use JsonSerializable;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;

abstract readonly class Data implements JsonSerializable
{
    /**
     * The model class of each list property, keyed by property name.
     *
     * @var array<string, class-string<Data>>
     */
    protected const LISTS = [];

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function from(array $attributes): static
    {
        $class = new ReflectionClass(static::class);
        $arguments = [];

        foreach ($class->getConstructor()?->getParameters() ?? [] as $parameter) {
            $value = static::cast($parameter, $attributes[$parameter->getName()] ?? null);

            if ($value === null && ! $parameter->isDefaultValueAvailable() && ! $parameter->allowsNull()) {
                throw new InvalidArgumentException(class_basename(static::class).' needs a value for "'.$parameter->getName().'".');
            }

            if ($value !== null || ! $parameter->isDefaultValueAvailable()) {
                $arguments[$parameter->getName()] = $value;
            }
        }

        return $class->newInstanceArgs($arguments);
    }

    /**
     * @param  iterable<array<string, mixed>>|null  $items
     * @return Collection<int, static>
     */
    public static function collect(?iterable $items): Collection
    {
        return collect($items ?? [])->map(fn (array $item) => static::from($item))->values();
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return collect(get_object_vars($this))
            ->map(fn (mixed $value) => static::serialise($value))
            ->reject(fn (mixed $value) => $value === null)
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    protected static function cast(ReflectionParameter $parameter, mixed $value): mixed
    {
        $type = $parameter->getType();
        $typeName = $type instanceof ReflectionNamedType ? $type->getName() : 'mixed';

        if ($typeName === Collection::class) {
            $class = static::LISTS[$parameter->getName()] ?? null;

            return is_iterable($value) ? collect($value)->map(fn (mixed $item) => $class && is_array($item) ? $class::from($item) : $item)->values() : null;
        }

        if ($value === null) {
            return null;
        }

        return match (true) {
            $typeName === 'int' => is_numeric($value) ? (int) $value : null,
            $typeName === 'float' => is_numeric($value) ? (float) $value : null,
            $typeName === 'bool' => filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            $typeName === 'string' => is_scalar($value) ? (string) $value : null,
            $typeName === 'array' => is_array($value) ? $value : null,
            $typeName === CarbonImmutable::class => static::date($value),
            is_subclass_of($typeName, self::class) => is_array($value) ? $typeName::from($value) : null,
            default => $value,
        };
    }

    protected static function date(mixed $value): ?CarbonImmutable
    {
        if (! is_string($value) || str_starts_with($value, '0001-01-01')) {
            return null;
        }

        try {
            return CarbonImmutable::parse($value);
        } catch (InvalidFormatException) {
            return null;
        }
    }

    protected static function serialise(mixed $value): mixed
    {
        return match (true) {
            $value instanceof self => $value->toArray(),
            $value instanceof Collection => $value->isEmpty() ? null : $value->map(fn (mixed $item) => static::serialise($item))->values()->all(),
            $value instanceof DateTimeInterface => $value->format('Y-m-d\TH:i:s'),
            $value instanceof BackedEnum => $value->value,
            is_array($value) => $value === [] ? null : $value,
            default => $value,
        };
    }
}
