<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Workflows;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\WorkflowForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a workflow.
 *
 * PUT /api/wellbeing/workflows
 */
class UpdateWorkflowRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\WorkflowForUpdate|array<string, mixed>  $workflow
     */
    public function __construct(
        protected WorkflowForUpdate|array $workflow,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/workflows';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->workflow instanceof Data ? $this->workflow->toArray() : $this->workflow;
    }
}
