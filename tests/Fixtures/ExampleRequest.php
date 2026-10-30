<?php

namespace spkm\IsamsApi\Tests\Fixtures;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

class ExampleRequest extends IsamsRequest
{
    protected Method $method = Method::GET;

    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(string $responseShape = self::RAW, ?string $dto = null, string $resultKey = '', bool $cacheable = false, private array $queryParameters = [])
    {
        $this->responseShape = $responseShape;
        $this->dto = $dto;
        $this->resultKey = $resultKey;
        $this->cacheable = $cacheable;
    }

    public function resolveEndpoint(): string
    {
        return '/api/example';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
