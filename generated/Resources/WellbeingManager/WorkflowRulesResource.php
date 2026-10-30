<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\RuleForCreate;
use spkm\IsamsApi\Data\WellbeingManager\RuleForUpdate;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\CreateWorkflowRuleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\DeleteWorkflowRuleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\GetWorkflowRuleParametersRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\GetWorkflowRuleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\GetWorkflowRuleTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\UpdateWorkflowRuleRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class WorkflowRulesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\GetWorkflowRuleParametersRequest
     */
    public function all(string $id): mixed
    {
        return $this->fetch(new GetWorkflowRuleParametersRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\RuleForCreate|array<string, mixed>  $rule
     * @see \spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\CreateWorkflowRuleRequest
     */
    public function create(RuleForCreate|array $rule): Created
    {
        return $this->fetch(new CreateWorkflowRuleRequest(rule: $rule));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\DeleteWorkflowRuleRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteWorkflowRuleRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\GetWorkflowRuleRequest
     */
    public function get(int $id): mixed
    {
        return $this->fetch(new GetWorkflowRuleRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\GetWorkflowRuleTypesRequest
     */
    public function getTypes(): mixed
    {
        return $this->fetch(new GetWorkflowRuleTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\RuleForUpdate|array<string, mixed>  $rule
     * @see \spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\UpdateWorkflowRuleRequest
     */
    public function update(RuleForUpdate|array $rule): bool
    {
        $this->fetch(new UpdateWorkflowRuleRequest(rule: $rule));

        return true;
    }
}
