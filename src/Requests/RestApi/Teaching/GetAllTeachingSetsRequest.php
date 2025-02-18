<?php

namespace spkm\IsamsApi\Requests\RestApi\Teaching;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'sets' property is an array of TeachingSet objects.
 */
class GetAllTeachingSetsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/teaching/sets';
    }
}
