<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ActionOutcomeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a concern action outcome.
 *
 * POST /api/wellbeing/concernactionoutcomes
 */
class CreateConcernActionOutcomeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ActionOutcomeForCreate|array<string, mixed>  $concernActionOutcome
     */
    public function __construct(
        protected ActionOutcomeForCreate|array $concernActionOutcome,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernactionoutcomes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernActionOutcome instanceof Data ? $this->concernActionOutcome->toArray() : $this->concernActionOutcome;
    }
}
