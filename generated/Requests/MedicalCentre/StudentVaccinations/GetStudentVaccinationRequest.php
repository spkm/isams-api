<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Vaccination;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical vaccination for a student.
 *
 * GET /api/medical/students/{schoolId}/vaccinations/{vaccinationId}
 */
class GetStudentVaccinationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Vaccination::class;

    public function __construct(
        protected string $schoolId,
        protected string $vaccinationId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/vaccinations/'.rawurlencode((string) $this->vaccinationId);
    }
}
