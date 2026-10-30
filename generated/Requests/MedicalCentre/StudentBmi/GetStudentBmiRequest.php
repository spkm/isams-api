<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentBmi;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Bmi;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical bmi for a student.
 *
 * GET /api/medical/students/{schoolId}/bmi/{bmiId}
 */
class GetStudentBmiRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Bmi::class;

    public function __construct(
        protected string $schoolId,
        protected string $bmiId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/bmi/'.rawurlencode((string) $this->bmiId);
    }
}
