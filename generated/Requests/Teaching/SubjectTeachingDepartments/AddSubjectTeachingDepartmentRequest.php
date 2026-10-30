<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an association between a subject and a teaching department.
 *
 * POST /api/teaching/subjects/{subjectId}/departments/{departmentId}
 */
class AddSubjectTeachingDepartmentRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

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
