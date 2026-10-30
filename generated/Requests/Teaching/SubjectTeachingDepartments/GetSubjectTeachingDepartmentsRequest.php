<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Teaching\TeachingDepartment;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all teaching departments associated with a subject.
 *
 * GET /api/teaching/subjects/{subjectId}/departments
 */
class GetSubjectTeachingDepartmentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = TeachingDepartment::class;
    public string $resultKey = 'teachingDepartments';

    public function __construct(
        protected int $subjectId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/subjects/'.rawurlencode((string) $this->subjectId).'/departments';
    }
}
