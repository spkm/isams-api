<?php

namespace spkm\IsamsApi;

use Illuminate\Support\LazyCollection;
use LogicException;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;
use UnexpectedValueException;

class IsamsPaginator extends PagedPaginator
{
    protected ?int $perPageLimit = 100;

    /**
     * Every item on every page, as models.
     *
     * @return LazyCollection<int, Data>
     */
    public function dtos(): LazyCollection
    {
        $request = $this->getOriginalRequest();
        $dto = $request instanceof IsamsRequest ? $request->dtoClass() : null;

        if ($dto === null) {
            throw new LogicException(class_basename($request).' has no model; use collect() for its items as arrays.');
        }

        return $this->models($dto);
    }

    /**
     * Every item on every page as the given model, saying which list is missing when iSAMS sends a page without it.
     *
     * @template TModel of Data
     *
     * @param  class-string<TModel>  $model
     * @return LazyCollection<int, TModel>
     */
    public function models(string $model): LazyCollection
    {
        $request = $this->getOriginalRequest();

        return $this->collect()->map(function (mixed $item) use ($request, $model) {
            if (! is_array($item)) {
                $key = property_exists($request, 'resultKey') && $request->resultKey !== '' ? '"'.$request->resultKey.'" ' : '';

                throw new UnexpectedValueException("iSAMS's response to ".$request->getMethod()->value.' '.$request->resolveEndpoint()." has no {$key}list of ".class_basename($model).' records.');
            }

            return $model::from($item);
        });
    }

    protected function isLastPage(Response $response): bool
    {
        return $this->currentPage >= (int) $response->json('totalPages');
    }

    /**
     * @return array<mixed>
     */
    protected function getPageItems(Response $response, Request $request): array
    {
        if (property_exists($request, 'resultKey')
            && ! empty($request->resultKey)
            && array_key_exists($request->resultKey, $response->json())) {
            return $response->json($request->resultKey) ?? [];
        }

        return $response->json();
    }

    protected function applyPagination(Request $request): Request
    {
        $request->query()->add('page', $this->currentPage + 1);

        if (isset($this->perPageLimit)) {
            $request->query()->add('pageSize', $this->perPageLimit);
        }

        return $request;
    }

    protected function getTotalPages(Response $response): int
    {
        return (int) $response->json('totalPages');
    }
}
