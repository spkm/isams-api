<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Doctors;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\DoctorForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a doctor for a surgery.
 *
 * POST /api/medical/surgery/{surgeryId}/doctors
 */
class CreateMedicalDoctorRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\DoctorForCreate|array<string, mixed>  $doctor
     */
    public function __construct(
        protected int $surgeryId,
        protected DoctorForCreate|array $doctor,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/surgery/'.rawurlencode((string) $this->surgeryId).'/doctors';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->doctor instanceof Data ? $this->doctor->toArray() : $this->doctor;
    }
}
