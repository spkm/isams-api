<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes an association between a subject and a teaching department.
 *
 * DELETE /api/teaching/subjects/{subjectId}/departments/{departmentId}
 */
class RemoveSubjectTeachingDepartmentRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $subjectId,
        protected int $departmentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/subjects/'.rawurlencode((string) $this->subjectId).'/departments/'.rawurlencode((string) $this->departmentId);
    }
}
