<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Doctors;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a doctor from a surgery.
 *
 * DELETE /api/medical/surgery/{surgeryId}/doctors/{doctorId}
 */
class DeleteMedicalDoctorRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected string $surgeryId,
        protected int $doctorId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/surgery/'.rawurlencode((string) $this->surgeryId).'/doctors/'.rawurlencode((string) $this->doctorId);
    }
}
