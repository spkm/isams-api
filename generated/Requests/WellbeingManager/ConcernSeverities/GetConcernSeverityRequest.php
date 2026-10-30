<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernSeverity;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Concern Severity.
 *
 * GET /api/wellbeing/concernseverities/{id}
 */
class GetConcernSeverityRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ConcernSeverity::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernseverities/'.rawurlencode((string) $this->id);
    }
}
