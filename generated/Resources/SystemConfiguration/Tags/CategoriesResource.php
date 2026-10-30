<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\Tags;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories\GetTagCategoriesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories\GetTagCategoryTagsRequest;

class CategoriesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetTagCategoriesRequest());
    }

    public function getTags(int $id): Response
    {
        return $this->connector->send(new GetTagCategoryTagsRequest($id));
    }
}
