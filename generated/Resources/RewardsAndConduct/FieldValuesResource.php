<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\RewardsAndConduct\FieldValues\GetFieldValueRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\FieldValues\GetFieldValuesRequest;

class FieldValuesResource extends BaseResource
{
    public function all(
        int $moduleTypeId,
        int $categoryId,
        int $fieldTypeId,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetFieldValuesRequest($moduleTypeId, $categoryId, $fieldTypeId, $filter));
    }

    public function get(int $moduleTypeId, int $categoryId, int $fieldTypeId, int $fieldValueId): Response
    {
        return $this->connector->send(new GetFieldValueRequest($moduleTypeId, $categoryId, $fieldTypeId, $fieldValueId));
    }
}
