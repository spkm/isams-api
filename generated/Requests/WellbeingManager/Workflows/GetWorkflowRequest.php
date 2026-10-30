<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Workflows;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\Workflow;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a workflow.
 *
 * GET /api/wellbeing/workflows/{id}
 */
class GetWorkflowRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Workflow::class;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/workflows/'.rawurlencode((string) $this->id);
    }
}
