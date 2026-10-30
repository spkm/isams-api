<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use spkm\IsamsApi\Resources\Estates\BuildingDivisionsResource;
use spkm\IsamsApi\Resources\Estates\BuildingRoomsResource;
use spkm\IsamsApi\Resources\Estates\BuildingsResource;
use spkm\IsamsApi\Resources\Estates\RoomsResource;

class EstatesResource extends IsamsResource
{
    public function buildingDivisions(): BuildingDivisionsResource
    {
        return new BuildingDivisionsResource($this->connector);
    }

    public function buildingRooms(): BuildingRoomsResource
    {
        return new BuildingRoomsResource($this->connector);
    }

    public function buildings(): BuildingsResource
    {
        return new BuildingsResource($this->connector);
    }

    public function rooms(): RoomsResource
    {
        return new RoomsResource($this->connector);
    }
}
