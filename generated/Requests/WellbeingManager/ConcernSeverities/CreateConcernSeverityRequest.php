<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernSeverityForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a concern Severity.
 *
 * POST /api/wellbeing/concernseverities
 */
class CreateConcernSeverityRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernSeverityForCreate|array<string, mixed>  $concernSeverity
     */
    public function __construct(
        protected ConcernSeverityForCreate|array $concernSeverity,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernseverities';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernSeverity instanceof Data ? $this->concernSeverity->toArray() : $this->concernSeverity;
    }
}
