<?php

namespace spkm\IsamsApi\Batch;

use spkm\IsamsApi\Data\Data;

abstract readonly class BatchData extends Data
{
    /**
     * Lists arrive inside their container node ({"Type": [...]}), and as a lone object when there is only one item. A
     * single value can arrive as a list with empty entries (iSAMS sends some ids twice, once empty): the value is kept.
     *
     * @param  array<string, mixed>  $attributes
     */
    public static function from(array $attributes): static
    {
        foreach (array_keys(static::LISTS) as $name) {
            $value = $attributes[$name] ?? null;

            if (is_array($value) && count($value) === 1 && ! array_is_list($value)) {
                $value = reset($value);
            }

            $attributes[$name] = is_array($value) && ! array_is_list($value) ? [$value] : $value;
        }

        foreach ($attributes as $name => $value) {
            if (! isset(static::LISTS[$name]) && is_array($value) && array_is_list($value) && $value !== [] && array_filter($value, fn (mixed $item) => is_array($item)) === []) {
                $attributes[$name] = array_values(array_filter($value, fn (mixed $item) => $item !== null && $item !== ''))[0] ?? null;
            }
        }

        return parent::from($attributes);
    }

    public static function propertyName(string $isamsName): string
    {
        return (string) preg_replace_callback('/^[A-Z]+(?=s?[A-Z][a-z]|[^A-Za-z]|$)|^[A-Z]/', fn (array $match) => strtolower($match[0]), $isamsName);
    }
}
