<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ActionOutcome;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Concern Action Outcome.
 *
 * GET /api/wellbeing/concernactionoutcomes/{id}
 */
class GetConcernActionOutcomeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ActionOutcome::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernactionoutcomes/'.rawurlencode((string) $this->id);
    }
}
