<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Requests\WellbeingManager\WorkflowActions\GetWorkflowActionTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class WorkflowActionsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\WorkflowActions\GetWorkflowActionTypesRequest
     */
    public function getTypes(): mixed
    {
        return $this->fetch(new GetWorkflowActionTypesRequest());
    }
}
