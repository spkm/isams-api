<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\PersonDoctorAndSurgery;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical doctor for a student.
 *
 * GET /api/medical/students/{schoolId}/doctor
 */
class GetStudentDoctorRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PersonDoctorAndSurgery::class;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/doctor';
    }
}
