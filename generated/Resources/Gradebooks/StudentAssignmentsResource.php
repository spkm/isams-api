<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\StudentAssignments\AddGradebookStudentAssignmentsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentAssignments\DeleteGradebookStudentAssignmentRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentAssignments\GetGradebookStudentAssignmentsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StudentAssignmentsResource extends IsamsResource
{
    /**
     * @param  array<mixed>  $schoolIds
     * @see \spkm\IsamsApi\Requests\Gradebooks\StudentAssignments\AddGradebookStudentAssignmentsRequest
     */
    public function add(int $gradebookId, array $schoolIds): Created
    {
        return $this->fetch(new AddGradebookStudentAssignmentsRequest(gradebookId: $gradebookId, schoolIds: $schoolIds));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\StudentAssignment>
     * @see \spkm\IsamsApi\Requests\Gradebooks\StudentAssignments\GetGradebookStudentAssignmentsRequest
     */
    public function all(int $gradebookId): Collection
    {
        return $this->fetch(new GetGradebookStudentAssignmentsRequest(gradebookId: $gradebookId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\StudentAssignments\DeleteGradebookStudentAssignmentRequest
     */
    public function delete(int $gradebookId, string $schoolId): void
    {
        $this->fetch(new DeleteGradebookStudentAssignmentRequest(gradebookId: $gradebookId, schoolId: $schoolId));
    }
}
