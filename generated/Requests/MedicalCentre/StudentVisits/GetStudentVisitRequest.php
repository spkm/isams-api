<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentVisits;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Visit;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical visit for a student.
 *
 * GET /api/medical/students/{schoolId}/visits/{visitId}
 */
class GetStudentVisitRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Visit::class;

    public function __construct(
        protected string $schoolId,
        protected string $visitId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/visits/'.rawurlencode((string) $this->visitId);
    }
}
