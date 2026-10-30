<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStudentForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\AssociateConcernStudentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\DisassociateConcernStudentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\GetConcernStudentsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\PatchConcernStudentRoleRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernStudentsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernStudentForCreate|array<string, mixed>  $concernStudent
     */
    public function associateConcernStudent(
        string $schoolId,
        int $concernId,
        ConcernStudentForCreate|array $concernStudent,
    ): Response {
        return $this->connector->send(new AssociateConcernStudentRequest($schoolId, $concernId, $concernStudent));
    }

    public function disassociateConcernStudent(int $id, int $concernId, string $schoolId): Response
    {
        return $this->connector->send(new DisassociateConcernStudentRequest($id, $concernId, $schoolId));
    }

    public function getConcernStudents(int $concernId, string $schoolId): Response
    {
        return $this->connector->send(new GetConcernStudentsRequest($concernId, $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchConcernStudentRole(
        string $schoolId,
        int $id,
        int $concernId,
        JsonPatch|array $patch,
    ): Response {
        return $this->connector->send(new PatchConcernStudentRoleRequest($schoolId, $id, $concernId, $patch));
    }
}
