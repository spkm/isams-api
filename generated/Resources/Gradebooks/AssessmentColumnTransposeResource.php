<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnTranspose\CreateAssessmentColumnTransposesRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnTranspose\DeleteAssessmentColumnTransposeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AssessmentColumnTransposeResource extends IsamsResource
{
    /**
     * @param  array<mixed>  $transposeIds
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnTranspose\CreateAssessmentColumnTransposesRequest
     */
    public function createMany(int $gradebookId, int $columnId, array $transposeIds): Created
    {
        return $this->fetch(new CreateAssessmentColumnTransposesRequest(gradebookId: $gradebookId, columnId: $columnId, transposeIds: $transposeIds));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnTranspose\DeleteAssessmentColumnTransposeRequest
     */
    public function delete(int $gradebookId, int $columnId, int $transposeId): void
    {
        $this->fetch(new DeleteAssessmentColumnTransposeRequest(gradebookId: $gradebookId, columnId: $columnId, transposeId: $transposeId));
    }
}
