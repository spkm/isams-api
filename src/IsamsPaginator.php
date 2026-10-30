<?php

namespace spkm\IsamsApi;

use Illuminate\Support\LazyCollection;
use LogicException;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

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

        return $this->collect()->map(fn (array $item) => $dto::from($item));
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
