<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnTranspose\CreateAssessmentColumnTransposesRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnTranspose\DeleteAssessmentColumnTransposeRequest;

class AssessmentColumnTransposeResource extends BaseResource
{
    /**
     * @param  array<mixed>  $transposeIds
     */
    public function createMany(int $gradebookId, int $columnId, array $transposeIds): Response
    {
        return $this->connector->send(new CreateAssessmentColumnTransposesRequest($gradebookId, $columnId, $transposeIds));
    }

    public function delete(int $gradebookId, int $columnId, int $transposeId): Response
    {
        return $this->connector->send(new DeleteAssessmentColumnTransposeRequest($gradebookId, $columnId, $transposeId));
    }
}
