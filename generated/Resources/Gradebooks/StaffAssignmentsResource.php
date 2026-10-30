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
    public function add(int $gradebookId, array $staffIds): Response
    {
        return $this->connector->send(new AddGradebookStaffAssignmentsRequest($gradebookId, $staffIds));
    }

    public function all(int $gradebookId): Response
    {
        return $this->connector->send(new GetGradebookStaffAssignmentsRequest($gradebookId));
    }

    public function delete(int $gradebookId, string $staffId): Response
    {
        return $this->connector->send(new DeleteGradebookStaffAssignmentRequest($gradebookId, $staffId));
    }
}
