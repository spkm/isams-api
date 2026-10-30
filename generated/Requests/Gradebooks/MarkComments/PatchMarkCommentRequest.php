<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\MarkComments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;
use spkm\IsamsApi\Support\JsonPatch;

/**
 * Update a comment for a student against an assessment.
 *
 * PATCH /api/gradebooks/{gradebookId}/columns/{columnId}/students/{schoolId}/comments/{commentId}
 */
#[Beta]
class PatchMarkCommentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function __construct(
        protected int $gradebookId,
        protected string $schoolId,
        protected int $columnId,
        protected int $commentId,
        protected JsonPatch|array $patch,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/columns/'.rawurlencode((string) $this->columnId).'/students/'.rawurlencode((string) $this->schoolId).'/comments/'.rawurlencode((string) $this->commentId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->patch instanceof JsonPatch ? $this->patch->toArray() : $this->patch;
    }
}
