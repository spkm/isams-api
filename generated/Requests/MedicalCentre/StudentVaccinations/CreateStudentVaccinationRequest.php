<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\VaccinationForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a medical vaccination for a student.
 *
 * POST /api/medical/students/{schoolId}/vaccinations
 */
class CreateStudentVaccinationRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\VaccinationForCreate|array<string, mixed>  $vaccination
     */
    public function __construct(
        protected string $schoolId,
        protected VaccinationForCreate|array $vaccination,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/vaccinations';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->vaccination instanceof Data ? $this->vaccination->toArray() : $this->vaccination;
    }
}
