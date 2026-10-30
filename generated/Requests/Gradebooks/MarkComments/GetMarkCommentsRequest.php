<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\MarkComments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Comment;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve comments for a student against an assessment.
 *
 * GET /api/gradebooks/{gradebookId}/columns/{columnId}/students/{schoolId}/comments
 */
#[Beta]
class GetMarkCommentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Comment::class;
    public string $resultKey = 'comments';

    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/columns/'.rawurlencode((string) $this->columnId).'/students/'.rawurlencode((string) $this->schoolId).'/comments';
    }
}
