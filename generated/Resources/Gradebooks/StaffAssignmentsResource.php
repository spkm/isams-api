<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\StaffAssignments\AddGradebookStaffAssignmentsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StaffAssignments\DeleteGradebookStaffAssignmentRequest;
use spkm\IsamsApi\Requests\Gradebooks\StaffAssignments\GetGradebookStaffAssignmentsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StaffAssignmentsResource extends IsamsResource
{
    /**
     * @param  array<mixed>  $staffIds
     * @see \spkm\IsamsApi\Requests\Gradebooks\StaffAssignments\AddGradebookStaffAssignmentsRequest
     */
    public function add(int $gradebookId, array $staffIds): Created
    {
        return $this->fetch(new AddGradebookStaffAssignmentsRequest(gradebookId: $gradebookId, staffIds: $staffIds));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\StaffAssignment>
     * @see \spkm\IsamsApi\Requests\Gradebooks\StaffAssignments\GetGradebookStaffAssignmentsRequest
     */
    public function all(int $gradebookId): Collection
    {
        return $this->fetch(new GetGradebookStaffAssignmentsRequest(gradebookId: $gradebookId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\StaffAssignments\DeleteGradebookStaffAssignmentRequest
     */
    public function delete(int $gradebookId, string $staffId): void
    {
        $this->fetch(new DeleteGradebookStaffAssignmentRequest(gradebookId: $gradebookId, staffId: $staffId));
    }
}
