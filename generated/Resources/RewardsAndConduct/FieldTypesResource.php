<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\RewardsAndConduct\FieldTypes\GetFieldTypeRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\FieldTypes\GetFieldTypesRequest;

class FieldTypesResource extends BaseResource
{
    public function all(int $moduleTypeId, int $categoryId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetFieldTypesRequest($moduleTypeId, $categoryId, $filter));
    }

    public function get(int $moduleTypeId, int $categoryId, int $fieldTypeId): Response
    {
        return $this->connector->send(new GetFieldTypeRequest($moduleTypeId, $categoryId, $fieldTypeId));
    }
}
