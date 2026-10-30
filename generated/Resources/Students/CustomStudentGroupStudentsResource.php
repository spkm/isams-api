<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForCreate;
use spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForUpdate;
use spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\CreateCustomStudentGroupStudentRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\DeleteCustomStudentGroupStudentRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\GetCustomStudentGroupStudentsRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\UpdateCustomStudentGroupStudentRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CustomStudentGroupStudentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomStudentGroupStudent>
     * @see \spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\GetCustomStudentGroupStudentsRequest
     */
    public function all(int $customGroupId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetCustomStudentGroupStudentsRequest(customGroupId: $customGroupId, filter: $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForCreate|array<string, mixed>  $customStudentGroupStudent
     * @see \spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\CreateCustomStudentGroupStudentRequest
     */
    public function create(
        int $customGroupId,
        string $schoolId,
        CustomStudentGroupStudentForCreate|array $customStudentGroupStudent,
    ): Created {
        return $this->fetch(new CreateCustomStudentGroupStudentRequest(customGroupId: $customGroupId, schoolId: $schoolId, customStudentGroupStudent: $customStudentGroupStudent));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\DeleteCustomStudentGroupStudentRequest
     */
    public function delete(int $customGroupId, string $schoolId): void
    {
        $this->fetch(new DeleteCustomStudentGroupStudentRequest(customGroupId: $customGroupId, schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForUpdate|array<string, mixed>  $customStudentGroupStudent
     * @see \spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\UpdateCustomStudentGroupStudentRequest
     */
    public function update(
        int $customGroupId,
        string $schoolId,
        CustomStudentGroupStudentForUpdate|array $customStudentGroupStudent,
    ): void {
        $this->fetch(new UpdateCustomStudentGroupStudentRequest(customGroupId: $customGroupId, schoolId: $schoolId, customStudentGroupStudent: $customStudentGroupStudent));
    }
}
