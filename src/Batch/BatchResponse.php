<?php

namespace spkm\IsamsApi\Batch;

use Illuminate\Support\Collection;
use InvalidArgumentException;
use Saloon\Http\Response;

final class BatchResponse
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(private readonly array $data, private readonly ?int $age = null) {}

    public static function fromResponse(Response $response): self
    {
        $data = json_decode($response->body() ?: '{}', true, flags: JSON_THROW_ON_ERROR);
        $age = $response->header('Age');

        return new self(is_array($data) ? $data : [], is_numeric($age) ? (int) $age : null);
    }

    /**
     * The records under one of a module's root nodes, as arrays with camelCase keys.
     *
     * @return Collection<int, mixed>
     */
    public function get(string $module, string $root): Collection
    {
        $node = $this->data['iSAMS'][$module][$root] ?? null;

        if (! is_array($node)) {
            return new Collection;
        }

        $entity = BatchMap::ROOTS[$module][$root]['entity'] ?? collect(array_keys($node))->first(fn (string $key) => ! str_starts_with($key, '@'));
        $records = $node[$entity] ?? [];
        $records = is_array($records) && array_is_list($records) ? $records : [$records];

        return collect($records)->reject(fn (mixed $record) => $record === null || $record === '')->map(fn (mixed $record) => self::normalise($record))->values();
    }

    /**
     * The records under one of a module's root nodes as models, or as arrays where the package has no model for them.
     *
     * @return Collection<int, mixed>
     */
    public function models(string $module, string $root): Collection
    {
        $model = BatchMap::ROOTS[$module][$root]['model'] ?? null;

        return $this->get($module, $root)->map(fn (mixed $record) => $model !== null && is_array($record) ? $model::from($record) : $record);
    }

    /**
     * The records a Batch API method returned, as models.
     *
     * @return Collection<int, mixed>
     */
    public function method(string $method): Collection
    {
        [$module, $root] = BatchMap::METHODS[$method] ?? throw new InvalidArgumentException('"'.$method.'" is not a Batch API method the package knows; use get() with its module and root node instead.');

        return $this->models($module, $root);
    }

    /**
     * How many seconds ago iSAMS cached this response, or null when iSAMS built it fresh.
     */
    public function cachedSecondsAgo(): ?int
    {
        return $this->age;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }

    private static function normalise(mixed $value): mixed
    {
        if (! is_array($value)) {
            return $value;
        }

        if (array_is_list($value)) {
            return array_map(self::normalise(...), $value);
        }

        if (array_key_exists('#text', $value)) {
            return $value['#text'];
        }

        if (array_keys($value) === ['@Legacy']) {
            return null;
        }

        $normalised = [];

        foreach ($value as $key => $item) {
            $normalised[BatchData::propertyName(ltrim((string) $key, '@'))] = self::normalise($item);
        }

        return $normalised;
    }
}
