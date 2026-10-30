<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Teaching;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\AddSubjectTeachingDepartmentRequest;
use spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\GetSubjectTeachingDepartmentsRequest;
use spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\RemoveSubjectTeachingDepartmentRequest;

class SubjectTeachingDepartmentsResource extends BaseResource
{
    public function addSubjectTeachingDepartment(int $subjectId, int $departmentId): Response
    {
        return $this->connector->send(new AddSubjectTeachingDepartmentRequest($subjectId, $departmentId));
    }

    public function getSubjectTeachingDepartments(int $subjectId): Response
    {
        return $this->connector->send(new GetSubjectTeachingDepartmentsRequest($subjectId));
    }

    public function removeSubjectTeachingDepartment(int $subjectId, int $departmentId): Response
    {
        return $this->connector->send(new RemoveSubjectTeachingDepartmentRequest($subjectId, $departmentId));
    }
}
