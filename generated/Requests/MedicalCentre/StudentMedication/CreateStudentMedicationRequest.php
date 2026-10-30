<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentMedication;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\MedicationForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a medical medication for a student.
 *
 * POST /api/medical/students/{schoolId}/medication
 */
class CreateStudentMedicationRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\MedicationForCreate|array<string, mixed>  $medication
     */
    public function __construct(
        protected string $schoolId,
        protected MedicationForCreate|array $medication,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/medication';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->medication instanceof Data ? $this->medication->toArray() : $this->medication;
    }
}
