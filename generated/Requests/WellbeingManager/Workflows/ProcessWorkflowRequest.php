<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Workflows;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/wellbeing/workflows/run/{workflowId}
 */
class ProcessWorkflowRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;
    protected bool $safe = false;

    public function __construct(
        protected int $workflowId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/workflows/run/'.rawurlencode((string) $this->workflowId);
    }
}
