<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Vaccination;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's medical vaccinations.
 *
 * GET /api/medical/students/{schoolId}/vaccinations
 */
class GetStudentVaccinationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Vaccination::class;
    public string $resultKey = 'vaccinations';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/vaccinations';
    }
}
