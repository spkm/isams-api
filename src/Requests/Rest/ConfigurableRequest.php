<?php

namespace spkm\IsamsApi\Requests\Rest;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ConfigurableRequest extends Request
{
    protected Method $method = Method::GET;

    protected string $endpoint;

    public function __construct(Method $method, string $endpoint)
    {
        $this->method = $method;
        $this->endpoint = $endpoint;
    }

    public function resolveEndpoint(): string
    {
        return $this->endpoint;
    }
}
