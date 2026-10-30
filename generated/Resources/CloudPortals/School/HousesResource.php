<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\Houses\GetHousesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class HousesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\House>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Houses\GetHousesRequest
     */
    public function all(?string $houseType = null): Collection
    {
        return $this->fetch(new GetHousesRequest(houseType: $houseType));
    }
}
