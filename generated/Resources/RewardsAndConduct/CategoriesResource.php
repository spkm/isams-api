<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\RewardsAndConduct\Categories\GetCategoriesRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Categories\GetCategoryRequest;

class CategoriesResource extends BaseResource
{
    public function getCategories(int $moduleTypeId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetCategoriesRequest($moduleTypeId, $filter));
    }

    public function getCategory(int $moduleTypeId, int $categoryId): Response
    {
        return $this->connector->send(new GetCategoryRequest($moduleTypeId, $categoryId));
    }
}
