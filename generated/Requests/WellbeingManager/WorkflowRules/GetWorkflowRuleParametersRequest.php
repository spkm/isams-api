<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Obtains parameter definitions for a workflow rule type.
 *
 * GET /api/wellbeing/workflowrules/parameters/{id}
 */
class GetWorkflowRuleParametersRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected string $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/workflowrules/parameters/'.rawurlencode((string) $this->id);
    }
}
