<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Estates;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Estates\BuildingRooms\GetBuildingRoomsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class BuildingRoomsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Estates\Room>
     * @see \spkm\IsamsApi\Requests\Estates\BuildingRooms\GetBuildingRoomsRequest
     */
    public function all(int $buildingId): Collection
    {
        return $this->fetch(new GetBuildingRoomsRequest(buildingId: $buildingId));
    }
}
