<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Doctors;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Doctor;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a doctor.
 *
 * GET /api/medical/surgery/{surgeryId}/doctors/{doctorId}
 */
class GetMedicalDoctorRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Doctor::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $doctorId,
        protected string $surgeryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/surgery/'.rawurlencode((string) $this->surgeryId).'/doctors/'.rawurlencode((string) $this->doctorId);
    }
}
