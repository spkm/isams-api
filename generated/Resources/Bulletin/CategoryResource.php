<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Bulletin;

use spkm\IsamsApi\Requests\Bulletin\Category\UpdateBulletinCategoryRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CategoryResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Bulletin\Category\UpdateBulletinCategoryRequest
     */
    public function update(int $bulletinId, int $categoryId): bool
    {
        $this->fetch(new UpdateBulletinCategoryRequest(bulletinId: $bulletinId, categoryId: $categoryId));

        return true;
    }
}
