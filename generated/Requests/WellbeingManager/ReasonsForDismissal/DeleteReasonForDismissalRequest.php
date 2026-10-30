<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a Reason For Dismissal.
 *
 * DELETE /api/wellbeing/reasonsfordismissal/{id}
 */
class DeleteReasonForDismissalRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/reasonsfordismissal/'.rawurlencode((string) $this->id);
    }
}
