<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all Concern Injury Types.
 *
 * GET /api/wellbeing/concerninjurytypes
 */
class GetConcernInjuryTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConcernInjuryType::class;
    public string $resultKey = 'concernInjuryTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concerninjurytypes';
    }
}
