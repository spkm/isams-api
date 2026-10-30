<?php

namespace spkm\IsamsApi\Batch;

use Illuminate\Support\Collection;

/**
 * The base of the generated Batch API groups: each call runs one Batch API method and returns its records as models,
 * throwing a BatchApiException when iSAMS refuses. Isams::batch()->send(new BatchRequest(...)) runs several at once.
 */
abstract class BatchGroup
{
    public function __construct(protected IsamsBatchConnector $connector) {}

    /**
     * @template TModel of BatchData
     *
     * @param  class-string<TModel>  $model
     * @param  array{module: string, element: string, attributes: array<string, \DateTimeInterface|bool|int|list<int|string>|null>, required: bool}|null  $filter
     * @return Collection<int, TModel>
     */
    protected function run(string $method, string $model, ?array $filter = null): Collection
    {
        $filters = BatchFilters::make()->methods($method);
        $attributes = array_filter($filter['attributes'] ?? [], fn (mixed $value) => $value !== null);

        if ($filter !== null && ($attributes !== [] || $filter['required'])) {
            $filters->filter($filter['module'], $filter['element'], $attributes);
        }

        $request = new BatchRequest($filters);

        /** @var Collection<int, TModel> $records */
        $records = $request->createDtoFromResponse($this->connector->send($request))->method($method);

        return $records;
    }
}
