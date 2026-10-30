<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes an association between a department and a subject.
 *
 * DELETE /api/school/departments/teaching/{departmentId}/subjects/{subjectId}
 */
class RemoveTeachingDepartmentSubjectRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

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
