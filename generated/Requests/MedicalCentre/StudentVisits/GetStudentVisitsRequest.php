<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentVisits;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Visit;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's  visits.
 *
 * GET /api/medical/students/{schoolId}/visits
 */
class GetStudentVisitsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Visit::class;
    public string $resultKey = 'visits';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/visits';
    }
}
