<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\StaffAssignments\AddGradebookStaffAssignmentsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StaffAssignments\DeleteGradebookStaffAssignmentRequest;
use spkm\IsamsApi\Requests\Gradebooks\StaffAssignments\GetGradebookStaffAssignmentsRequest;

class StaffAssignmentsResource extends BaseResource
{
    /**
     * @param  array<mixed>  $staffIds
     */
    public function addGradebookStaffAssignments(int $gradebookId, array $staffIds): Response
    {
        return $this->connector->send(new AddGradebookStaffAssignmentsRequest($gradebookId, $staffIds));
    }

    public function deleteGradebookStaffAssignment(int $gradebookId, string $staffId): Response
    {
        return $this->connector->send(new DeleteGradebookStaffAssignmentRequest($gradebookId, $staffId));
    }

    public function getGradebookStaffAssignments(int $gradebookId): Response
    {
        return $this->connector->send(new GetGradebookStaffAssignmentsRequest($gradebookId));
    }
}
