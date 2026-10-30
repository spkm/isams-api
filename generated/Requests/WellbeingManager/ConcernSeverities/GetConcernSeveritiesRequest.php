<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernSeverity;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all concern severities.
 *
 * GET /api/wellbeing/concernseverities
 */
class GetConcernSeveritiesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConcernSeverity::class;
    public string $resultKey = 'severities';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernseverities';
    }
}
