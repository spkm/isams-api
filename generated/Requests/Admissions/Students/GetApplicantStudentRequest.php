<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Students;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Admissions\Student;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a current student.
 *
 * GET /api/admissions/applicants/students/{schoolId}
 */
class GetApplicantStudentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Student::class;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/students/'.rawurlencode((string) $this->schoolId);
    }
}
