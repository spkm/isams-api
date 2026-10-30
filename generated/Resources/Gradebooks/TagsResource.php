<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\Tags\CreateGradebookTagsRequest;
use spkm\IsamsApi\Requests\Gradebooks\Tags\DeleteGradebookTagRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class TagsResource extends IsamsResource
{
    /**
     * @param  array<int, \spkm\IsamsApi\Data\Gradebooks\TagForCreate|array<string, mixed>>  $tags
     * @see \spkm\IsamsApi\Requests\Gradebooks\Tags\CreateGradebookTagsRequest
     */
    public function createMany(int $gradebookId, array $tags): Created
    {
        return $this->fetch(new CreateGradebookTagsRequest(gradebookId: $gradebookId, tags: $tags));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\Tags\DeleteGradebookTagRequest
     */
    public function delete(int $gradebookId, int $categoryId, int $categoryEntityId): bool
    {
        $this->fetch(new DeleteGradebookTagRequest(gradebookId: $gradebookId, categoryId: $categoryId, categoryEntityId: $categoryEntityId));

        return true;
    }
}
