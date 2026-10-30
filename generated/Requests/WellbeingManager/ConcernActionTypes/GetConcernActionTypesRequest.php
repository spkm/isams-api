<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ActionType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all concern action types.
 *
 * GET /api/wellbeing/concernactiontypes
 */
class GetConcernActionTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ActionType::class;
    public string $resultKey = 'actionTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernactiontypes';
    }
}
