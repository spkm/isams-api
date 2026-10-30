<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Condition;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\ConditionType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Condition Types.
 *
 * GET /api/medical/conditiontypes
 */
class GetMedicalConditionTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConditionType::class;
    public string $resultKey = 'conditionTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/conditiontypes';
    }
}
