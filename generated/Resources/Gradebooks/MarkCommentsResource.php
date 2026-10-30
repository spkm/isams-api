<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Gradebooks\CommentForCreate;
use spkm\IsamsApi\Requests\Gradebooks\MarkComments\CreateMarkCommentRequest;
use spkm\IsamsApi\Requests\Gradebooks\MarkComments\DeleteMarkCommentRequest;
use spkm\IsamsApi\Requests\Gradebooks\MarkComments\GetMarkCommentsRequest;
use spkm\IsamsApi\Requests\Gradebooks\MarkComments\PatchMarkCommentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class MarkCommentsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\CommentForCreate|array<string, mixed>  $comment
     */
    public function createMarkComment(
        int $gradebookId,
        string $schoolId,
        int $columnId,
        CommentForCreate|array $comment,
    ): Response {
        return $this->connector->send(new CreateMarkCommentRequest($gradebookId, $schoolId, $columnId, $comment));
    }

    public function deleteMarkComment(int $gradebookId, string $schoolId, int $columnId, int $commentId): Response
    {
        return $this->connector->send(new DeleteMarkCommentRequest($gradebookId, $schoolId, $columnId, $commentId));
    }

    public function getMarkComments(int $gradebookId, string $schoolId, int $columnId): Response
    {
        return $this->connector->send(new GetMarkCommentsRequest($gradebookId, $schoolId, $columnId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchMarkComment(
        int $gradebookId,
        string $schoolId,
        int $columnId,
        int $commentId,
        JsonPatch|array $patch,
    ): Response {
        return $this->connector->send(new PatchMarkCommentRequest($gradebookId, $schoolId, $columnId, $commentId, $patch));
    }
}
