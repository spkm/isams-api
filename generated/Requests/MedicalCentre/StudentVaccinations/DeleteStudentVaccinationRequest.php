<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a medical vaccination from a student.
 *
 * DELETE /api/medical/students/{schoolId}/vaccinations/{vaccinationId}
 */
class DeleteStudentVaccinationRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

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
