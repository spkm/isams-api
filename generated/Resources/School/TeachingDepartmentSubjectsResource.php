<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects\AddTeachingDepartmentSubjectRequest;
use spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects\GetTeachingDepartmentSubjectsRequest;
use spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects\RemoveTeachingDepartmentSubjectRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class TeachingDepartmentSubjectsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects\AddTeachingDepartmentSubjectRequest
     */
    public function add(int $departmentId, int $subjectId): Created
    {
        return $this->fetch(new AddTeachingDepartmentSubjectRequest(departmentId: $departmentId, subjectId: $subjectId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\Subject>
     * @see \spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects\GetTeachingDepartmentSubjectsRequest
     */
    public function all(int $departmentId): Collection
    {
        return $this->fetch(new GetTeachingDepartmentSubjectsRequest(departmentId: $departmentId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\School\TeachingDepartmentSubjects\RemoveTeachingDepartmentSubjectRequest
     */
    public function remove(int $departmentId, int $subjectId): void
    {
        $this->fetch(new RemoveTeachingDepartmentSubjectRequest(departmentId: $departmentId, subjectId: $subjectId));
    }
}
