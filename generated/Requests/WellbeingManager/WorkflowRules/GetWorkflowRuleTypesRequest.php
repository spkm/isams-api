<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\WorkflowRules;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Obtains all available rule types.
 *
 * GET /api/wellbeing/workflowrules/types
 */
class GetWorkflowRuleTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/workflowrules/types';
    }
}
