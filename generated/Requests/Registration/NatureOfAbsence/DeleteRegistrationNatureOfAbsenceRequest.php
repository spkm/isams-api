<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\NatureOfAbsence;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Delete the nature of absence for a registration pupil.
 *
 * DELETE /api/registration/natureofabsence/{registrationPupilId}
 */
#[Beta]
class DeleteRegistrationNatureOfAbsenceRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $registrationPupilId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/natureofabsence/'.rawurlencode((string) $this->registrationPupilId);
    }
}
