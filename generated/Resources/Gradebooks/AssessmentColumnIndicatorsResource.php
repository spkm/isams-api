<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnIndicators\CreateAssessmentColumnIndicatorsRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnIndicators\DeleteAssessmentColumnIndicatorRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AssessmentColumnIndicatorsResource extends IsamsResource
{
    /**
     * @param  array<mixed>  $indicators
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnIndicators\CreateAssessmentColumnIndicatorsRequest
     */
    public function createMany(int $gradebookId, int $columnId, array $indicators): Created
    {
        return $this->fetch(new CreateAssessmentColumnIndicatorsRequest(gradebookId: $gradebookId, columnId: $columnId, indicators: $indicators));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnIndicators\DeleteAssessmentColumnIndicatorRequest
     */
    public function delete(int $gradebookId, int $columnId, int $indicatorId): void
    {
        $this->fetch(new DeleteAssessmentColumnIndicatorRequest(gradebookId: $gradebookId, columnId: $columnId, indicatorId: $indicatorId));
    }
}
