<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnTranspose;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Add a transpose to a given Gradebook/column.
 *
 * POST /api/gradebooks/{gradebookId}/structure/assessmentcolumns/{columnId}/transpose
 */
#[Beta]
class CreateAssessmentColumnTransposesRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $transposeIds
     */
    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
        protected array $transposeIds,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/assessmentcolumns/'.rawurlencode((string) $this->columnId).'/transpose';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_values($this->transposeIds);
    }
}
