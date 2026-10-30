<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\AlumniStudents;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\AlumniStudent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student.
 *
 * GET /api/alumni/students/{schoolId}
 */
class GetAlumniStudentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = AlumniStudent::class;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/alumni/students/'.rawurlencode((string) $this->schoolId);
    }
}
