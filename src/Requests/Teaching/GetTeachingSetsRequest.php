<?php

namespace spkm\IsamsApi\Requests\Teaching;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'sets' property is an array of TeachingSet objects.
 */
class GetTeachingSetsRequest extends Request
{
    protected Method $method = Method::GET;
    public string $resultKey = 'sets';

    public function resolveEndpoint(): string
    {
        return '/api/teaching/sets';
    }
}
