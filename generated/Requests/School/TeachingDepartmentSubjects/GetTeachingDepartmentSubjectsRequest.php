<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\Subject;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all subjects associated with a department.
 *
 * GET /api/school/departments/teaching/{departmentId}/subjects
 */
class GetTeachingDepartmentSubjectsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Subject::class;
    public string $resultKey = 'subjects';
    protected bool $cacheable = true;

    public function __construct(
        protected int $departmentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/departments/teaching/'.rawurlencode((string) $this->departmentId).'/subjects';
    }
}
