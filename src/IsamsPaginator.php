<?php

namespace spkm\IsamsApi;

use Illuminate\Support\LazyCollection;
use JsonException;
use LogicException;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Exceptions\ServerErrorException;
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
        return $this->currentPage >= $this->totalPagesIn($response);
    }

    /**
     * @return array<mixed>
     */
    protected function getPageItems(Response $response, Request $request): array
    {
        $page = $this->page($response);

        if (property_exists($request, 'resultKey')
            && ! empty($request->resultKey)
            && array_key_exists($request->resultKey, $page)) {
            return (array) ($page[$request->resultKey] ?? []);
        }

        return $page;
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
        return $this->totalPagesIn($response);
    }

    /**
     * The number of pages iSAMS reports. Without one the response is not a paged list, and paging through it would
     * otherwise stop silently after the first page.
     */
    private function totalPagesIn(Response $response): int
    {
        $totalPages = $this->page($response)['totalPages'] ?? null;

        if (! is_numeric($totalPages)) {
            $request = $this->getOriginalRequest();

            throw new UnexpectedValueException("iSAMS's response to ".$request->getMethod()->value.' '.$request->resolveEndpoint().' has no totalPages, so it is not a paged list: send the request instead of paging through it.');
        }

        return (int) $totalPages;
    }

    /**
     * A page as iSAMS's JSON, or a ServerErrorException when iSAMS answered with something else, such as a proxy's or
     * maintenance page.
     *
     * @return array<mixed>
     */
    private function page(Response $response): array
    {
        try {
            return (array) $response->json();
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }
    }
}
