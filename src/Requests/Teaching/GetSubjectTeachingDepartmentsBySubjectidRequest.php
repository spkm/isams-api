<?php

namespace spkm\IsamsApi\Requests\Teaching;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'teachingDepartments' property is an array of TeachingDepartment objects.
 */
class GetSubjectTeachingDepartmentsBySubjectidRequest extends Request
{
    protected Method $method = Method::GET;
    public string $resultKey = 'teachingDepartments';

    public function resolveEndpoint(): string
    {
        return "/api/teaching/subjects/{$this->subjectId}/departments";
    }

    /**
     * @param  int  $subjectId  The unique identifier of a subject to retrieve the teaching departments for.
     */
    public function __construct(
        protected int $subjectId,
    ) {}
}
