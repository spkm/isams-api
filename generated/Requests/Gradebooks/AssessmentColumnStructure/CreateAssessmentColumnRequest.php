<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnStructure;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\AssessmentColumnStructureForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an assessment column against a Gradebook.
 *
 * POST /api/gradebooks/{gradebookId}/structure/assessmentcolumns
 */
#[Beta]
class CreateAssessmentColumnRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\AssessmentColumnStructureForCreate|array<string, mixed>  $assessmentColumnStructure
     */
    public function __construct(
        protected int $gradebookId,
        protected AssessmentColumnStructureForCreate|array $assessmentColumnStructure,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/assessmentcolumns';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->assessmentColumnStructure instanceof Data ? $this->assessmentColumnStructure->toArray() : $this->assessmentColumnStructure;
    }
}
