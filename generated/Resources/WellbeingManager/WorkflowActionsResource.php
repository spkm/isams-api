<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowActions\GetWorkflowActionTypesRequest;

class WorkflowActionsResource extends BaseResource
{
    public function getWorkflowActionTypes(): Response
    {
        return $this->connector->send(new GetWorkflowActionTypesRequest());
    }
}
