<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Resources\SystemConfiguration\Tags\CategoriesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\Tags\EntityTypesResource;

class TagsResource extends IsamsResource
{
    public function categories(): CategoriesResource
    {
        return new CategoriesResource($this->connector);
    }

    public function entityTypes(): EntityTypesResource
    {
        return new EntityTypesResource($this->connector);
    }
}
