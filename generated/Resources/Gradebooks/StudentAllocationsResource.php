<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\StudentAllocations\CreateGradebookStudentAllocationsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentAllocations\DeleteGradebookStudentAllocationRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentAllocations\GetGradebookStudentAllocationsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StudentAllocationsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\Allocation>
     * @see \spkm\IsamsApi\Requests\Gradebooks\StudentAllocations\GetGradebookStudentAllocationsRequest
     */
    public function all(int $gradebookId, string $criteria): Collection
    {
        return $this->fetch(new GetGradebookStudentAllocationsRequest(gradebookId: $gradebookId, criteria: $criteria));
    }

    /**
     * @param  array<mixed>  $studentAllocations
     * @see \spkm\IsamsApi\Requests\Gradebooks\StudentAllocations\CreateGradebookStudentAllocationsRequest
     */
    public function createMany(int $gradebookId, string $criteria, array $studentAllocations): Created
    {
        return $this->fetch(new CreateGradebookStudentAllocationsRequest(gradebookId: $gradebookId, criteria: $criteria, studentAllocations: $studentAllocations));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\StudentAllocations\DeleteGradebookStudentAllocationRequest
     */
    public function delete(int $gradebookId, string $criteria, int $allocationId): void
    {
        $this->fetch(new DeleteGradebookStudentAllocationRequest(gradebookId: $gradebookId, criteria: $criteria, allocationId: $allocationId));
    }
}
