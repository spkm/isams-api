<?php

namespace spkm\IsamsApi\Batch;

use Illuminate\Support\LazyCollection;
use InvalidArgumentException;

/**
 * The base of the generated Batch API groups: each call runs one Batch API method and returns its records as models,
 * built as the loop reaches them, throwing a BatchApiException when iSAMS refuses. Isams::batch()->send(new
 * BatchRequest(...)) runs several at once.
 */
abstract class BatchGroup
{
    public function __construct(protected IsamsBatchConnector $connector) {}

    /**
     * @template TModel of BatchData
     *
     * @param  class-string<TModel>  $model
     * @param  array{module: string, element: string, attributes: array<string, \DateTimeInterface|bool|int|list<int|string>|null>, required: bool}|null  $filter
     * @return LazyCollection<int, TModel>
     */
    protected function run(string $method, string $model, ?array $filter = null): LazyCollection
    {
        $filters = BatchFilters::make()->methods($method);
        $attributes = array_filter($filter['attributes'] ?? [], fn (mixed $value) => $value !== null && $value !== []);

        if ($filter !== null && $filter['required'] && $attributes === []) {
            $names = array_keys($filter['attributes']);

            throw new InvalidArgumentException("$method needs at least one of its filters: ".implode(', ', array_slice($names, 0, -1)).(count($names) > 1 ? ' or ' : '').end($names).'.');
        }

        if ($attributes !== []) {
            $filters->filter($filter['module'], $filter['element'], $attributes);
        }

        $request = new BatchRequest($filters);
        [$module, $root] = BatchMap::METHODS[$method];
        $records = $request->createDtoFromResponse($this->connector->send($request))->get($module, $root);

        return LazyCollection::make(function () use ($records, $model) {
            foreach ($records as $record) {
                yield is_array($record) ? $model::from($record) : $record;
            }
        });
    }
}
