<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Teaching;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\AddSubjectTeachingDepartmentRequest;
use spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\GetSubjectTeachingDepartmentsRequest;
use spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\RemoveSubjectTeachingDepartmentRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SubjectTeachingDepartmentsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\AddSubjectTeachingDepartmentRequest
     */
    public function add(int $subjectId, int $departmentId): Created
    {
        return $this->fetch(new AddSubjectTeachingDepartmentRequest(subjectId: $subjectId, departmentId: $departmentId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Teaching\TeachingDepartment>
     * @see \spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\GetSubjectTeachingDepartmentsRequest
     */
    public function all(int $subjectId): Collection
    {
        return $this->fetch(new GetSubjectTeachingDepartmentsRequest(subjectId: $subjectId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\RemoveSubjectTeachingDepartmentRequest
     */
    public function remove(int $subjectId, int $departmentId): bool
    {
        $this->fetch(new RemoveSubjectTeachingDepartmentRequest(subjectId: $subjectId, departmentId: $departmentId));

        return true;
    }
}
