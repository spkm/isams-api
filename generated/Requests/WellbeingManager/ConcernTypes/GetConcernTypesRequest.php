<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all concern types.
 *
 * GET /api/wellbeing/concerntypes
 */
class GetConcernTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConcernType::class;
    public string $resultKey = 'types';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concerntypes';
    }
}
