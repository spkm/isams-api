<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\FlagTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\PastoralFlagType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all pastoral flag types.
 *
 * GET /api/wellbeing/flagtypes
 */
class GetFlagTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PastoralFlagType::class;
    public string $resultKey = 'flagTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/flagtypes';
    }
}
