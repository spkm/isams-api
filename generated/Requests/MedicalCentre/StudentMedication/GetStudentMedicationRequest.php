<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentMedication;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Medication;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical medication for a student.
 *
 * GET /api/medical/students/{schoolId}/medication/{medicationId}
 */
class GetStudentMedicationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Medication::class;

    public function __construct(
        protected string $schoolId,
        protected string $medicationId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/medication/'.rawurlencode((string) $this->medicationId);
    }
}
