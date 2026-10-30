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
    public function all(string $schoolId, int $concernId): Response
    {
        return $this->connector->send(new GetConcernStudentsRequest($schoolId, $concernId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernStudentForCreate|array<string, mixed>  $concernStudent
     */
    public function associate(
        string $schoolId,
        int $concernId,
        ConcernStudentForCreate|array $concernStudent,
    ): Response {
        return $this->connector->send(new AssociateConcernStudentRequest($schoolId, $concernId, $concernStudent));
    }

    public function disassociate(string $schoolId, int $concernId, int $id): Response
    {
        return $this->connector->send(new DisassociateConcernStudentRequest($schoolId, $concernId, $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchRole(string $schoolId, int $concernId, int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernStudentRoleRequest($schoolId, $concernId, $id, $patch));
    }
}
