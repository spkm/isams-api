<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\RewardsAndConduct\FieldValue;
use spkm\IsamsApi\Requests\RewardsAndConduct\FieldValues\GetFieldValueRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\FieldValues\GetFieldValuesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FieldValuesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\RewardsAndConduct\FieldValue>
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\FieldValues\GetFieldValuesRequest
     */
    public function all(
        int $moduleTypeId,
        int $categoryId,
        int $fieldTypeId,
        string|Stringable|null $filter = null,
    ): Collection {
        return $this->fetch(new GetFieldValuesRequest(moduleTypeId: $moduleTypeId, categoryId: $categoryId, fieldTypeId: $fieldTypeId, filter: $filter));
    }

    /**
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\FieldValues\GetFieldValueRequest
     */
    public function get(int $moduleTypeId, int $categoryId, int $fieldTypeId, int $fieldValueId): FieldValue
    {
        return $this->fetch(new GetFieldValueRequest(moduleTypeId: $moduleTypeId, categoryId: $categoryId, fieldTypeId: $fieldTypeId, fieldValueId: $fieldValueId));
    }
}
