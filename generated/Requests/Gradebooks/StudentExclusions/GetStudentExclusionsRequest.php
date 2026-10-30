<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StudentExclusions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\StudentExclusion;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve students excluded from a column.
 *
 * GET /api/gradebooks/{gradebookId}/structure/assessmentcolumns/{columnId}/studentexclusions
 */
#[Beta]
class GetStudentExclusionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = StudentExclusion::class;

    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/assessmentcolumns/'.rawurlencode((string) $this->columnId).'/studentexclusions';
    }
}
