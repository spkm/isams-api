<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Teaching;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Teaching\Sets\AddStudentToTeachingSetRequest;
use spkm\IsamsApi\Requests\Teaching\Sets\GetTeachingSetStudentsRequest;
use spkm\IsamsApi\Requests\Teaching\Sets\GetTeachingSetsRequest;
use spkm\IsamsApi\Requests\Teaching\Sets\RemoveStudentFromTeachingSetRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SetsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Teaching\Sets\AddStudentToTeachingSetRequest
     */
    public function addStudent(int $setId, string $schoolId): Created
    {
        return $this->fetch(new AddStudentToTeachingSetRequest(setId: $setId, schoolId: $schoolId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Teaching\TeachingSet>
     * @see \spkm\IsamsApi\Requests\Teaching\Sets\GetTeachingSetsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetTeachingSetsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Teaching\Student>
     * @see \spkm\IsamsApi\Requests\Teaching\Sets\GetTeachingSetStudentsRequest
     */
    public function getStudents(int $setId): Collection
    {
        return $this->fetch(new GetTeachingSetStudentsRequest(setId: $setId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Teaching\Sets\RemoveStudentFromTeachingSetRequest
     */
    public function removeStudent(int $setId, string $schoolId): bool
    {
        $this->fetch(new RemoveStudentFromTeachingSetRequest(setId: $setId, schoolId: $schoolId));

        return true;
    }
}
