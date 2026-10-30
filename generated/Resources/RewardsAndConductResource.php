<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use spkm\IsamsApi\Resources\RewardsAndConduct\CategoriesResource;
use spkm\IsamsApi\Resources\RewardsAndConduct\FieldTypesResource;
use spkm\IsamsApi\Resources\RewardsAndConduct\FieldValuesResource;
use spkm\IsamsApi\Resources\RewardsAndConduct\ModuleTypesResource;
use spkm\IsamsApi\Resources\RewardsAndConduct\RewardsResource;

class RewardsAndConductResource extends IsamsResource
{
    public function categories(): CategoriesResource
    {
        return new CategoriesResource($this->connector);
    }

    public function fieldTypes(): FieldTypesResource
    {
        return new FieldTypesResource($this->connector);
    }

    public function fieldValues(): FieldValuesResource
    {
        return new FieldValuesResource($this->connector);
    }

    public function moduleTypes(): ModuleTypesResource
    {
        return new ModuleTypesResource($this->connector);
    }

    public function rewards(): RewardsResource
    {
        return new RewardsResource($this->connector);
    }
}
