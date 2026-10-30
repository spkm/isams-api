<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Resets all user visibility for a concern.
 *
 * POST /api/wellbeing/students/{schoolId}/concerns/{concernId}/visibilities/reset
 */
class ResetConcernVisibilitiesRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $schoolId,
        protected int $concernId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/visibilities/reset';
    }
}
