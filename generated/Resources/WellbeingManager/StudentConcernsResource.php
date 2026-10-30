<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\Concern;
use spkm\IsamsApi\Data\WellbeingManager\ConcernForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\CreateStudentConcernRequest;
use spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\DeleteStudentConcernRequest;
use spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\GetStudentConcernRequest;
use spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\PatchStudentConcernRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentConcernsResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernForCreate|array<string, mixed>  $concern
     * @see \spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\CreateStudentConcernRequest
     */
    public function create(string $schoolId, ConcernForCreate|array $concern): Created
    {
        return $this->fetch(new CreateStudentConcernRequest(schoolId: $schoolId, concern: $concern));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\DeleteStudentConcernRequest
     */
    public function delete(string $schoolId, int $id): bool
    {
        $this->fetch(new DeleteStudentConcernRequest(schoolId: $schoolId, id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\GetStudentConcernRequest
     */
    public function get(string $schoolId, int $id): Concern
    {
        return $this->fetch(new GetStudentConcernRequest(schoolId: $schoolId, id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\PatchStudentConcernRequest
     */
    public function patch(string $schoolId, int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchStudentConcernRequest(schoolId: $schoolId, id: $id, patch: $patch));

        return true;
    }
}
