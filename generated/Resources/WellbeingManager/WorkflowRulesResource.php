<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\RuleForCreate;
use spkm\IsamsApi\Data\WellbeingManager\RuleForUpdate;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\CreateWorkflowRuleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\DeleteWorkflowRuleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\GetWorkflowRuleParametersRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\GetWorkflowRuleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\GetWorkflowRuleTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules\UpdateWorkflowRuleRequest;

class WorkflowRulesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\RuleForCreate|array<string, mixed>  $rule
     */
    public function createWorkflowRule(RuleForCreate|array $rule): Response
    {
        return $this->connector->send(new CreateWorkflowRuleRequest($rule));
    }

    public function deleteWorkflowRule(int $id): Response
    {
        return $this->connector->send(new DeleteWorkflowRuleRequest($id));
    }

    public function getWorkflowRule(int $id): Response
    {
        return $this->connector->send(new GetWorkflowRuleRequest($id));
    }

    public function getWorkflowRuleParameters(string $id): Response
    {
        return $this->connector->send(new GetWorkflowRuleParametersRequest($id));
    }

    public function getWorkflowRuleTypes(): Response
    {
        return $this->connector->send(new GetWorkflowRuleTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\RuleForUpdate|array<string, mixed>  $rule
     */
    public function updateWorkflowRule(RuleForUpdate|array $rule): Response
    {
        return $this->connector->send(new UpdateWorkflowRuleRequest($rule));
    }
}
