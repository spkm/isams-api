<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnStructure;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\AssessmentColumnStructure;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve an assessment column.
 *
 * GET /api/gradebooks/{gradebookId}/structure/assessmentcolumns/{columnId}
 */
#[Beta]
class GetAssessmentColumnRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = AssessmentColumnStructure::class;

    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/assessmentcolumns/'.rawurlencode((string) $this->columnId);
    }
}
