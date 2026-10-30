<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a concern Severity.
 *
 * DELETE /api/wellbeing/concernseverities/{id}
 */
class DeleteConcernSeverityRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernseverities/'.rawurlencode((string) $this->id);
    }
}
