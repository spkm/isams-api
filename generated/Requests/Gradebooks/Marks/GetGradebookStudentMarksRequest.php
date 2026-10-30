<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\Marks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Student;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve a student, with their marks against a Gradebook.
 *
 * GET /api/gradebooks/{gradebookId}/marks/students/{schoolId}
 */
#[Beta]
class GetGradebookStudentMarksRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Student::class;

    public function __construct(
        protected int $gradebookId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/marks/students/'.rawurlencode((string) $this->schoolId);
    }
}
