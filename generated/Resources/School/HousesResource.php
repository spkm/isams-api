<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\School\House;
use spkm\IsamsApi\Requests\School\Houses\GetHouseRequest;
use spkm\IsamsApi\Requests\School\Houses\GetHousesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class HousesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\House>
     * @see \spkm\IsamsApi\Requests\School\Houses\GetHousesRequest
     */
    public function all(?string $houseType = null): Collection
    {
        return $this->fetch(new GetHousesRequest(houseType: $houseType));
    }

    /**
     * @see \spkm\IsamsApi\Requests\School\Houses\GetHouseRequest
     */
    public function get(int $id): House
    {
        return $this->fetch(new GetHouseRequest(id: $id));
    }
}
