<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\Workflow;
use spkm\IsamsApi\Data\WellbeingManager\WorkflowForCreate;
use spkm\IsamsApi\Data\WellbeingManager\WorkflowForUpdate;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\CreateWorkflowRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\DeleteWorkflowRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\GetWorkflowRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\ProcessWorkflowRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\ProcessWorkflowsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\UpdateWorkflowRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class WorkflowsResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\WorkflowForCreate|array<string, mixed>  $workflow
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Workflows\CreateWorkflowRequest
     */
    public function create(WorkflowForCreate|array $workflow): Created
    {
        return $this->fetch(new CreateWorkflowRequest(workflow: $workflow));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Workflows\DeleteWorkflowRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteWorkflowRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Workflows\GetWorkflowRequest
     */
    public function get(int $id): Workflow
    {
        return $this->fetch(new GetWorkflowRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Workflows\ProcessWorkflowRequest
     */
    public function process(int $workflowId): mixed
    {
        return $this->fetch(new ProcessWorkflowRequest(workflowId: $workflowId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Workflows\ProcessWorkflowsRequest
     */
    public function processAll(): mixed
    {
        return $this->fetch(new ProcessWorkflowsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\WorkflowForUpdate|array<string, mixed>  $workflow
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Workflows\UpdateWorkflowRequest
     */
    public function update(WorkflowForUpdate|array $workflow): void
    {
        $this->fetch(new UpdateWorkflowRequest(workflow: $workflow));
    }
}
