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
    public function all(int $gradebookId, int $columnId, string $schoolId): Response
    {
        return $this->connector->send(new GetMarkCommentsRequest($gradebookId, $columnId, $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\CommentForCreate|array<string, mixed>  $comment
     */
    public function create(
        int $gradebookId,
        int $columnId,
        string $schoolId,
        CommentForCreate|array $comment,
    ): Response {
        return $this->connector->send(new CreateMarkCommentRequest($gradebookId, $columnId, $schoolId, $comment));
    }

    public function delete(int $gradebookId, int $columnId, string $schoolId, int $commentId): Response
    {
        return $this->connector->send(new DeleteMarkCommentRequest($gradebookId, $columnId, $schoolId, $commentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(
        int $gradebookId,
        int $columnId,
        string $schoolId,
        int $commentId,
        JsonPatch|array $patch,
    ): Response {
        return $this->connector->send(new PatchMarkCommentRequest($gradebookId, $columnId, $schoolId, $commentId, $patch));
    }
}
