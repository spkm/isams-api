<?php

namespace spkm\IsamsApi\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ConfigurablePaginatedRequest extends Request implements Paginatable
{
    protected string $endpoint;
    protected Method $method;
    public string $resultKey;


    public function __construct(
        string $endpoint,
        ?Method $method = Method::GET,
        protected mixed $page = null,
        protected mixed $pageSize = null,
        protected mixed $expand = null,
        protected mixed $filter = null,
        ?string $resultKey = null,
    ) {
        $this->endpoint = $endpoint;
        $this->method = $method;
        $this->resultKey = $resultKey;
    }


    public function resolveEndpoint(): string
    {
        return $this->endpoint;
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page, 'pageSize' => $this->pageSize, 'expand' => $this->expand, '$filter' => $this->filter
        ]);
    }
}
