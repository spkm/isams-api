<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Bulletin;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Bulletin\Category\UpdateBulletinCategoryRequest;

class CategoryResource extends BaseResource
{
    public function updateBulletinCategory(int $bulletinId, int $categoryId): Response
    {
        return $this->connector->send(new UpdateBulletinCategoryRequest($bulletinId, $categoryId));
    }
}
