<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\WorkflowForCreate;
use spkm\IsamsApi\Data\WellbeingManager\WorkflowForUpdate;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\CreateWorkflowRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\DeleteWorkflowRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\GetWorkflowRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\ProcessWorkflowRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\ProcessWorkflowsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\UpdateWorkflowRequest;

class WorkflowsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\WorkflowForCreate|array<string, mixed>  $workflow
     */
    public function createWorkflow(WorkflowForCreate|array $workflow): Response
    {
        return $this->connector->send(new CreateWorkflowRequest($workflow));
    }

    public function deleteWorkflow(int $id): Response
    {
        return $this->connector->send(new DeleteWorkflowRequest($id));
    }

    public function getWorkflow(int $id): Response
    {
        return $this->connector->send(new GetWorkflowRequest($id));
    }

    public function processWorkflow(int $workflowId): Response
    {
        return $this->connector->send(new ProcessWorkflowRequest($workflowId));
    }

    public function processWorkflows(): Response
    {
        return $this->connector->send(new ProcessWorkflowsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\WorkflowForUpdate|array<string, mixed>  $workflow
     */
    public function updateWorkflow(WorkflowForUpdate|array $workflow): Response
    {
        return $this->connector->send(new UpdateWorkflowRequest($workflow));
    }
}
