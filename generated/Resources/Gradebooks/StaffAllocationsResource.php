<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\CreateGradebookStaffAllocationsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\DeleteGradebookStaffAllocationRequest;
use spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\GetGradebookStaffAllocationsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StaffAllocationsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\Allocation>
     * @see \spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\GetGradebookStaffAllocationsRequest
     */
    public function all(int $gradebookId, string $criteria): Collection
    {
        return $this->fetch(new GetGradebookStaffAllocationsRequest(gradebookId: $gradebookId, criteria: $criteria));
    }

    /**
     * @param  array<mixed>  $staffAllocations
     * @see \spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\CreateGradebookStaffAllocationsRequest
     */
    public function createMany(int $gradebookId, string $criteria, array $staffAllocations): Created
    {
        return $this->fetch(new CreateGradebookStaffAllocationsRequest(gradebookId: $gradebookId, criteria: $criteria, staffAllocations: $staffAllocations));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\DeleteGradebookStaffAllocationRequest
     */
    public function delete(int $gradebookId, string $criteria, int $allocationId): bool
    {
        $this->fetch(new DeleteGradebookStaffAllocationRequest(gradebookId: $gradebookId, criteria: $criteria, allocationId: $allocationId));

        return true;
    }
}
