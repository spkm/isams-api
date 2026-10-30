<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects\AddTeachingDepartmentSubjectRequest;
use spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects\GetTeachingDepartmentSubjectsRequest;
use spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects\RemoveTeachingDepartmentSubjectRequest;

class TeachingDepartmentSubjectsResource extends BaseResource
{
    public function addTeachingDepartmentSubject(int $departmentId, int $subjectId): Response
    {
        return $this->connector->send(new AddTeachingDepartmentSubjectRequest($departmentId, $subjectId));
    }

    public function getTeachingDepartmentSubjects(int $departmentId): Response
    {
        return $this->connector->send(new GetTeachingDepartmentSubjectsRequest($departmentId));
    }

    public function removeTeachingDepartmentSubject(int $departmentId, int $subjectId): Response
    {
        return $this->connector->send(new RemoveTeachingDepartmentSubjectRequest($departmentId, $subjectId));
    }
}
