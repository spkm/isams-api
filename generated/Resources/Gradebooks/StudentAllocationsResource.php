<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\StudentAllocations\CreateGradebookStudentAllocationsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentAllocations\DeleteGradebookStudentAllocationRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentAllocations\GetGradebookStudentAllocationsRequest;

class StudentAllocationsResource extends BaseResource
{
    /**
     * @param  array<mixed>  $studentAllocations
     */
    public function createGradebookStudentAllocations(
        int $gradebookId,
        string $criteria,
        array $studentAllocations,
    ): Response {
        return $this->connector->send(new CreateGradebookStudentAllocationsRequest($gradebookId, $criteria, $studentAllocations));
    }

    public function deleteGradebookStudentAllocation(int $gradebookId, string $criteria, int $allocationId): Response
    {
        return $this->connector->send(new DeleteGradebookStudentAllocationRequest($gradebookId, $criteria, $allocationId));
    }

    public function getGradebookStudentAllocations(int $gradebookId, string $criteria): Response
    {
        return $this->connector->send(new GetGradebookStudentAllocationsRequest($gradebookId, $criteria));
    }
}
