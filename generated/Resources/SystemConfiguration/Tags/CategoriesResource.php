<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\Tags;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories\GetTagCategoriesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories\GetTagCategoryTagsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CategoriesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\PrivateCategory>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories\GetTagCategoriesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetTagCategoriesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\PrivateTag>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories\GetTagCategoryTagsRequest
     */
    public function getTags(int $id): Collection
    {
        return $this->fetch(new GetTagCategoryTagsRequest(id: $id));
    }
}
