<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnWeightings\CreateAssessmentColumnWeightingsRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnWeightings\DeleteAssessmentColumnWeightingRequest;

class AssessmentColumnWeightingsResource extends BaseResource
{
    /**
     * @param  array<mixed>  $weightingElementIds
     */
    public function createMany(int $gradebookId, int $columnId, array $weightingElementIds): Response
    {
        return $this->connector->send(new CreateAssessmentColumnWeightingsRequest($gradebookId, $columnId, $weightingElementIds));
    }

    public function delete(int $gradebookId, int $columnId, int $weightingId): Response
    {
        return $this->connector->send(new DeleteAssessmentColumnWeightingRequest($gradebookId, $columnId, $weightingId));
    }
}
