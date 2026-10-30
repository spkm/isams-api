<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\ReasonForChange;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Delete a Reason for Change record against a Registration Code change.
 *
 * DELETE /api/registration/register/{periodId}/students/{schoolId}/reasonforchanges/{codeChangeId}
 */
#[Beta]
class DeleteRegistrationReasonForChangeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $periodId,
        protected string $schoolId,
        protected int $codeChangeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/register/'.rawurlencode((string) $this->periodId).'/students/'.rawurlencode((string) $this->schoolId).'/reasonforchanges/'.rawurlencode((string) $this->codeChangeId);
    }
}
