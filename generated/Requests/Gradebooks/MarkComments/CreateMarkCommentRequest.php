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
use spkm\IsamsApi\Data\Gradebooks\CommentForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Create a comment for a student against an assessment.
 *
 * POST /api/gradebooks/{gradebookId}/columns/{columnId}/students/{schoolId}/comments
 */
#[Beta]
class CreateMarkCommentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\CommentForCreate|array<string, mixed>  $comment
     */
    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
        protected string $schoolId,
        protected CommentForCreate|array $comment,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/columns/'.rawurlencode((string) $this->columnId).'/students/'.rawurlencode((string) $this->schoolId).'/comments';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->comment instanceof Data ? $this->comment->toArray() : $this->comment;
    }
}
