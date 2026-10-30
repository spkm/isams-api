<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\TeachingSets;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Teaching\TeachingSet;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all sets.
 *
 * GET /api/teaching/sets
 */
class GetTeachingSetsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = TeachingSet::class;
    public string $resultKey = 'sets';

    public function resolveEndpoint(): string
    {
        return '/api/teaching/sets';
    }
}
