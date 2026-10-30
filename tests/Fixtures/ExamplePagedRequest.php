<?php

namespace spkm\IsamsApi\Tests\Fixtures;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Requests\IsamsRequest;

class ExamplePagedRequest extends IsamsRequest implements Paginatable
{
    public string $resultKey = 'students';

    protected Method $method = Method::GET;

    protected string $responseShape = self::LIST;

    protected ?string $dto = ExampleStudent::class;

    public function resolveEndpoint(): string
    {
        return '/api/example';
    }
}
