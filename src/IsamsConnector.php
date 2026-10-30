<?php

namespace spkm\IsamsApi;

use JsonSerializable;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;
use spkm\IsamsApi\Requests\AdhocRequest;
use spkm\IsamsApi\Requests\ConfigurablePaginatedRequest;
use spkm\IsamsApi\Resources\HasResources;

class IsamsConnector extends IsamsBaseConnector implements HasPagination
{
    use HasResources;

    /**
     * @return IsamsPaginator
     */
    public function paginate(Request $request): PagedPaginator
    {
        return new IsamsPaginator($this, $request);
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function get(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::GET, $path, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function post(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::POST, $path, $query, $body));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function put(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::PUT, $path, $query, $body));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function patch(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::PATCH, $path, $query, $body));
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function delete(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::DELETE, $path, $query));
    }

    /**
     * @param  array<string, mixed>  $query
     * @return IsamsPaginator
     */
    public function paginateEndpoint(string $path, string $resultKey, array $query = []): PagedPaginator
    {
        $request = new ConfigurablePaginatedRequest($path, resultKey: $resultKey);
        $request->query()->merge($query);

        return $this->paginate($request);
    }
}
