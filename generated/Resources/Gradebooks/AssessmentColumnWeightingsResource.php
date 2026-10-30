<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnWeightings\CreateAssessmentColumnWeightingsRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnWeightings\DeleteAssessmentColumnWeightingRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AssessmentColumnWeightingsResource extends IsamsResource
{
    /**
     * @param  array<mixed>  $weightingElementIds
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnWeightings\CreateAssessmentColumnWeightingsRequest
     */
    public function createMany(int $gradebookId, int $columnId, array $weightingElementIds): Created
    {
        return $this->fetch(new CreateAssessmentColumnWeightingsRequest(gradebookId: $gradebookId, columnId: $columnId, weightingElementIds: $weightingElementIds));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnWeightings\DeleteAssessmentColumnWeightingRequest
     */
    public function delete(int $gradebookId, int $columnId, int $weightingId): void
    {
        $this->fetch(new DeleteAssessmentColumnWeightingRequest(gradebookId: $gradebookId, columnId: $columnId, weightingId: $weightingId));
    }
}
