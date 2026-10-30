<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\Tags\CreateGradebookTagsRequest;
use spkm\IsamsApi\Requests\Gradebooks\Tags\DeleteGradebookTagRequest;

class TagsResource extends BaseResource
{
    /**
     * @param  list<\spkm\IsamsApi\Data\Gradebooks\TagForCreate|array<string, mixed>>  $tags
     */
    public function createGradebookTags(int $gradebookId, array $tags): Response
    {
        return $this->connector->send(new CreateGradebookTagsRequest($gradebookId, $tags));
    }

    public function deleteGradebookTag(int $gradebookId, int $categoryId, int $categoryEntityId): Response
    {
        return $this->connector->send(new DeleteGradebookTagRequest($gradebookId, $categoryId, $categoryEntityId));
    }
}
