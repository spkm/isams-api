<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForCreate;
use spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForUpdate;
use spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\CreateCustomStudentGroupStudentRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\DeleteCustomStudentGroupStudentRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\GetCustomStudentGroupStudentsRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents\UpdateCustomStudentGroupStudentRequest;

class CustomStudentGroupStudentsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForCreate|array<string, mixed>  $customStudentGroupStudent
     */
    public function createCustomStudentGroupStudent(
        int $customGroupId,
        string $schoolId,
        CustomStudentGroupStudentForCreate|array $customStudentGroupStudent,
    ): Response {
        return $this->connector->send(new CreateCustomStudentGroupStudentRequest($customGroupId, $schoolId, $customStudentGroupStudent));
    }

    public function deleteCustomStudentGroupStudent(int $customGroupId, string $schoolId): Response
    {
        return $this->connector->send(new DeleteCustomStudentGroupStudentRequest($customGroupId, $schoolId));
    }

    public function getCustomStudentGroupStudents(int $customGroupId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetCustomStudentGroupStudentsRequest($customGroupId, $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForUpdate|array<string, mixed>  $customStudentGroupStudent
     */
    public function updateCustomStudentGroupStudent(
        int $customGroupId,
        string $schoolId,
        CustomStudentGroupStudentForUpdate|array $customStudentGroupStudent,
    ): Response {
        return $this->connector->send(new UpdateCustomStudentGroupStudentRequest($customGroupId, $schoolId, $customStudentGroupStudent));
    }
}
