<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Gradebooks\StudentExclusion;
use spkm\IsamsApi\Requests\Gradebooks\StudentExclusions\CreateStudentExclusionsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentExclusions\DeleteStudentExclusionRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentExclusions\GetStudentExclusionsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StudentExclusionsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\StudentExclusions\GetStudentExclusionsRequest
     */
    public function all(int $gradebookId, int $columnId): ?StudentExclusion
    {
        return $this->fetch(new GetStudentExclusionsRequest(gradebookId: $gradebookId, columnId: $columnId));
    }

    /**
     * @param  array<mixed>  $schoolIds
     * @see \spkm\IsamsApi\Requests\Gradebooks\StudentExclusions\CreateStudentExclusionsRequest
     */
    public function createMany(int $gradebookId, int $columnId, array $schoolIds): Created
    {
        return $this->fetch(new CreateStudentExclusionsRequest(gradebookId: $gradebookId, columnId: $columnId, schoolIds: $schoolIds));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\StudentExclusions\DeleteStudentExclusionRequest
     */
    public function delete(int $gradebookId, int $columnId, string $schoolId): bool
    {
        $this->fetch(new DeleteStudentExclusionRequest(gradebookId: $gradebookId, columnId: $columnId, schoolId: $schoolId));

        return true;
    }
}
