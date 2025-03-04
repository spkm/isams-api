<?php

namespace spkm\IsamsApi\Requests\RestApi;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ConfigurableRequest extends Request
{
    protected string $endpoint;
    protected Method $method;

    public function __construct(string $endpoint, ?Method $method = Method::GET)
    {
        $this->endpoint = $endpoint;
        $this->method = $method;
    }

    public function resolveEndpoint(): string
    {
        return $this->endpoint;
    }
}
