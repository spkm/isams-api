<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\AssessmentColumnIndicators;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Adds indicators to an assessment column.
 *
 * POST /api/gradebooks/{gradebookId}/structure/assessmentcolumns/{columnId}/indicators
 */
#[Beta]
class CreateAssessmentColumnIndicatorsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $indicators
     */
    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
        protected array $indicators,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/assessmentcolumns/'.rawurlencode((string) $this->columnId).'/indicators';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_values($this->indicators);
    }
}
