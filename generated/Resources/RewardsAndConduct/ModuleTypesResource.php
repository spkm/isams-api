<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Requests\RewardsAndConduct\ModuleTypes\GetModuleTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ModuleTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\RewardsAndConduct\ModuleType>
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\ModuleTypes\GetModuleTypesRequest
     */
    public function all(string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetModuleTypesRequest(filter: $filter));
    }
}
