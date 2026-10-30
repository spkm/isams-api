<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\RewardsAndConduct\FieldType;
use spkm\IsamsApi\Requests\RewardsAndConduct\FieldTypes\GetFieldTypeRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\FieldTypes\GetFieldTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FieldTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\RewardsAndConduct\FieldType>
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\FieldTypes\GetFieldTypesRequest
     */
    public function all(int $moduleTypeId, int $categoryId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetFieldTypesRequest(moduleTypeId: $moduleTypeId, categoryId: $categoryId, filter: $filter));
    }

    /**
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\FieldTypes\GetFieldTypeRequest
     */
    public function get(int $moduleTypeId, int $categoryId, int $fieldTypeId): FieldType
    {
        return $this->fetch(new GetFieldTypeRequest(moduleTypeId: $moduleTypeId, categoryId: $categoryId, fieldTypeId: $fieldTypeId));
    }
}
