<?php

namespace spkm\IsamsApi\Requests;

use Saloon\Contracts\ArrayStore as ArrayStoreContract;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class ConfigurableRequest extends Request
{
    protected Method $method = Method::GET;
    protected string $endpoint;
    protected ArrayStoreContract $query;

    public function __construct(Method $method, string $endpoint, ArrayStoreContract $query)
    {
        $this->method = $method;
        $this->endpoint = $endpoint;
        $this->query = $query;
    }


    public function resolveEndpoint(): string
    {
        return $this->endpoint;
    }
}
