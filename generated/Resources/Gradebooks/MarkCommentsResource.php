<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Gradebooks\CommentForCreate;
use spkm\IsamsApi\Requests\Gradebooks\MarkComments\CreateMarkCommentRequest;
use spkm\IsamsApi\Requests\Gradebooks\MarkComments\DeleteMarkCommentRequest;
use spkm\IsamsApi\Requests\Gradebooks\MarkComments\GetMarkCommentsRequest;
use spkm\IsamsApi\Requests\Gradebooks\MarkComments\PatchMarkCommentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class MarkCommentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\Comment>
     * @see \spkm\IsamsApi\Requests\Gradebooks\MarkComments\GetMarkCommentsRequest
     */
    public function all(int $gradebookId, int $columnId, string $schoolId): Collection
    {
        return $this->fetch(new GetMarkCommentsRequest(gradebookId: $gradebookId, columnId: $columnId, schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\CommentForCreate|array<string, mixed>  $comment
     * @see \spkm\IsamsApi\Requests\Gradebooks\MarkComments\CreateMarkCommentRequest
     */
    public function create(
        int $gradebookId,
        int $columnId,
        string $schoolId,
        CommentForCreate|array $comment,
    ): Created {
        return $this->fetch(new CreateMarkCommentRequest(gradebookId: $gradebookId, columnId: $columnId, schoolId: $schoolId, comment: $comment));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\MarkComments\DeleteMarkCommentRequest
     */
    public function delete(int $gradebookId, int $columnId, string $schoolId, int $commentId): void
    {
        $this->fetch(new DeleteMarkCommentRequest(gradebookId: $gradebookId, columnId: $columnId, schoolId: $schoolId, commentId: $commentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Gradebooks\MarkComments\PatchMarkCommentRequest
     */
    public function patch(
        int $gradebookId,
        int $columnId,
        string $schoolId,
        int $commentId,
        JsonPatch|array $patch,
    ): void {
        $this->fetch(new PatchMarkCommentRequest(gradebookId: $gradebookId, columnId: $columnId, schoolId: $schoolId, commentId: $commentId, patch: $patch));
    }
}
