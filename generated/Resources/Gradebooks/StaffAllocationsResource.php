<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\CreateGradebookStaffAllocationsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\DeleteGradebookStaffAllocationRequest;
use spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\GetGradebookStaffAllocationsRequest;

class StaffAllocationsResource extends BaseResource
{
    /**
     * @param  array<mixed>  $staffAllocations
     */
    public function createGradebookStaffAllocations(
        int $gradebookId,
        string $criteria,
        array $staffAllocations,
    ): Response {
        return $this->connector->send(new CreateGradebookStaffAllocationsRequest($gradebookId, $criteria, $staffAllocations));
    }

    public function deleteGradebookStaffAllocation(int $gradebookId, string $criteria, int $allocationId): Response
    {
        return $this->connector->send(new DeleteGradebookStaffAllocationRequest($gradebookId, $criteria, $allocationId));
    }

    public function getGradebookStaffAllocations(int $gradebookId, string $criteria): Response
    {
        return $this->connector->send(new GetGradebookStaffAllocationsRequest($gradebookId, $criteria));
    }
}
