<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories\GetTagCategoriesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories\GetTagCategoryTagsRequest;

class TagsCategoriesResource extends BaseResource
{
    public function getTagCategories(): Response
    {
        return $this->connector->send(new GetTagCategoriesRequest());
    }

    public function getTagCategoryTags(int $id): Response
    {
        return $this->connector->send(new GetTagCategoryTagsRequest($id));
    }
}
