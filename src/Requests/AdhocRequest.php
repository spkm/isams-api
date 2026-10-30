<?php

namespace spkm\IsamsApi\Requests;

use JsonSerializable;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class AdhocRequest extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * @param  array<string, mixed>  $queryParameters
     * @param  array<mixed>|JsonSerializable|null  $payload
     */
    public function __construct(
        protected Method $method,
        protected string $path,
        protected array $queryParameters = [],
        protected array|JsonSerializable|null $payload = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return $this->path;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->queryParameters;
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->payload instanceof JsonSerializable ? (array) $this->payload->jsonSerialize() : ($this->payload ?? []);
    }
}
