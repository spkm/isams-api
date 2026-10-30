<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\RewardsAndConduct\Category;
use spkm\IsamsApi\Requests\RewardsAndConduct\Categories\GetCategoriesRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Categories\GetCategoryRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CategoriesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\RewardsAndConduct\Category>
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\Categories\GetCategoriesRequest
     */
    public function all(int $moduleTypeId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetCategoriesRequest(moduleTypeId: $moduleTypeId, filter: $filter));
    }

    /**
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\Categories\GetCategoryRequest
     */
    public function get(int $moduleTypeId, int $categoryId): Category
    {
        return $this->fetch(new GetCategoryRequest(moduleTypeId: $moduleTypeId, categoryId: $categoryId));
    }
}
