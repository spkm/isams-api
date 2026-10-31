<?php

namespace spkm\IsamsApi\Generator\Naming;

use Illuminate\Support\Str;

/**
 * The word-level helpers the naming shares: a name's words, two names joined without repeating a word, and a word's
 * singular and studly forms.
 */
final class Words
{
    /**
     * @return list<string>
     */
    public static function of(string $name): array
    {
        preg_match_all('/[A-Z]+(?![a-z])|[A-Z][a-z0-9]*|[a-z0-9]+/', $name, $matches);

        return $matches[0];
    }

    /**
     * The two names joined, without repeating the words the first ends with and the second starts with.
     *
     * @param  list<string>  $first
     * @param  list<string>  $second
     */
    public static function join(array $first, array $second): string
    {
        for ($overlap = min(count($first), count($second)); $overlap > 0; $overlap--) {
            if (array_slice($first, -$overlap) === array_slice($second, 0, $overlap)) {
                return implode('', [...$first, ...array_slice($second, $overlap)]);
            }
        }

        return implode('', [...$first, ...$second]);
    }

    public static function singular(string $word): string
    {
        return strtolower(Str::singular($word));
    }

    public static function studly(string $value): string
    {
        return Str::studly((string) preg_replace('/[^A-Za-z0-9]+/', ' ', $value));
    }
}
