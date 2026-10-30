<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\RuleForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a workflow rule.
 *
 * POST /api/wellbeing/workflowrules
 */
class CreateWorkflowRuleRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\RuleForCreate|array<string, mixed>  $rule
     */
    public function __construct(
        protected RuleForCreate|array $rule,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/workflowrules';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->rule instanceof Data ? $this->rule->toArray() : $this->rule;
    }
}
