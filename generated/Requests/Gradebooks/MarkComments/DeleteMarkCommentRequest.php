<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\MarkComments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Remove a comment for a student against an assessment.
 *
 * DELETE /api/gradebooks/{gradebookId}/columns/{columnId}/students/{schoolId}/comments/{commentId}
 */
#[Beta]
class DeleteMarkCommentRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
        protected string $schoolId,
        protected int $commentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/columns/'.rawurlencode((string) $this->columnId).'/students/'.rawurlencode((string) $this->schoolId).'/comments/'.rawurlencode((string) $this->commentId);
    }
}
