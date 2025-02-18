<?php

namespace spkm\IsamsApi\Requests\RestApi;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ConfigurablePaginatedRequest extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    protected string $endpoint;

    public function __construct(
        Method $method,
        string $endpoint,
        protected mixed $page = null,
        protected mixed $pageSize = null,
        protected mixed $expand = null,
        protected mixed $filter = null,
    ) {
        $this->method = $method;
        $this->endpoint = $endpoint;
    }

    public function resolveEndpoint(): string
    {
        return $this->endpoint;
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page, 'pageSize' => $this->pageSize, 'expand' => $this->expand, '$filter' => $this->filter,
        ]);
    }
}
