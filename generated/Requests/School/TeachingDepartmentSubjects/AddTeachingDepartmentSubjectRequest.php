<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an association between a department and a subject.
 *
 * POST /api/school/departments/teaching/{departmentId}/subjects/{subjectId}
 */
class AddTeachingDepartmentSubjectRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected int $departmentId,
        protected int $subjectId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/departments/teaching/'.rawurlencode((string) $this->departmentId).'/subjects/'.rawurlencode((string) $this->subjectId);
    }
}
