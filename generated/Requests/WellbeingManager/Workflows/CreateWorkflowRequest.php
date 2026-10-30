<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Workflows;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\WorkflowForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a workflow.
 *
 * POST /api/wellbeing/workflows
 */
class CreateWorkflowRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\WorkflowForCreate|array<string, mixed>  $workflow
     */
    public function __construct(
        protected WorkflowForCreate|array $workflow,
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
