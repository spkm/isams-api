<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\Tags;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\SystemConfiguration\PrivateEntityType;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\EntityTypes\GetTagEntityTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\EntityTypes\GetTagEntityTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EntityTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\PrivateEntityType>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\Tags\EntityTypes\GetTagEntityTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetTagEntityTypesRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\Tags\EntityTypes\GetTagEntityTypeRequest
     */
    public function get(int $id): PrivateEntityType
    {
        return $this->fetch(new GetTagEntityTypeRequest(id: $id));
    }
}
