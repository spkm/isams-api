<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\PersonDoctorAndSurgeryForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a surgery and/or doctor for a student.
 *
 * POST /api/medical/students/{schoolId}/doctor
 */
class CreateStudentDoctorRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\PersonDoctorAndSurgeryForCreate|array<string, mixed>  $personDoctorAndSurgery
     */
    public function __construct(
        protected string $schoolId,
        protected PersonDoctorAndSurgeryForCreate|array $personDoctorAndSurgery,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/doctor';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->personDoctorAndSurgery instanceof Data ? $this->personDoctorAndSurgery->toArray() : $this->personDoctorAndSurgery;
    }
}
