<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Condition;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\ConditionSeverity;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Condition severity.
 *
 * GET /api/medical/conditionseverities
 */
class GetMedicalConditionSeveritiesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConditionSeverity::class;
    public string $resultKey = 'conditionSeverities';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/conditionseverities';
    }
}
