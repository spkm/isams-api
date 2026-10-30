<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnIndicators\CreateAssessmentColumnIndicatorsRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnIndicators\DeleteAssessmentColumnIndicatorRequest;

class AssessmentColumnIndicatorsResource extends BaseResource
{
    /**
     * @param  array<mixed>  $indicators
     */
    public function createAssessmentColumnIndicators(int $gradebookId, int $columnId, array $indicators): Response
    {
        return $this->connector->send(new CreateAssessmentColumnIndicatorsRequest($gradebookId, $columnId, $indicators));
    }

    public function deleteAssessmentColumnIndicator(int $gradebookId, int $columnId, int $indicatorId): Response
    {
        return $this->connector->send(new DeleteAssessmentColumnIndicatorRequest($gradebookId, $columnId, $indicatorId));
    }
}
