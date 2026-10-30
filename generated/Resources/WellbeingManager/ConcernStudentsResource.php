<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStudentForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\AssociateConcernStudentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\DisassociateConcernStudentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\GetConcernStudentsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\PatchConcernStudentRoleRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernStudentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ConcernStudentSummary>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\GetConcernStudentsRequest
     */
    public function all(string $schoolId, int $concernId): Collection
    {
        return $this->fetch(new GetConcernStudentsRequest(schoolId: $schoolId, concernId: $concernId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernStudentForCreate|array<string, mixed>  $concernStudent
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\AssociateConcernStudentRequest
     */
    public function associate(
        string $schoolId,
        int $concernId,
        ConcernStudentForCreate|array $concernStudent,
    ): Created {
        return $this->fetch(new AssociateConcernStudentRequest(schoolId: $schoolId, concernId: $concernId, concernStudent: $concernStudent));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\DisassociateConcernStudentRequest
     */
    public function disassociate(string $schoolId, int $concernId, int $id): bool
    {
        $this->fetch(new DisassociateConcernStudentRequest(schoolId: $schoolId, concernId: $concernId, id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents\PatchConcernStudentRoleRequest
     */
    public function patchRole(string $schoolId, int $concernId, int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchConcernStudentRoleRequest(schoolId: $schoolId, concernId: $concernId, id: $id, patch: $patch));

        return true;
    }
}
