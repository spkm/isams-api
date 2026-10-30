<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ActionOutcome;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all concern action outcomes.
 *
 * GET /api/wellbeing/concernactionoutcomes
 */
class GetConcernActionOutcomesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ActionOutcome::class;
    public string $resultKey = 'actionOutcomes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernactionoutcomes';
    }
}
