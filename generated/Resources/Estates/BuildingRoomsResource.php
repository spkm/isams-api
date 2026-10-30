<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Estates;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Estates\BuildingRooms\GetBuildingRoomsRequest;

class BuildingRoomsResource extends BaseResource
{
    public function getBuildingRooms(int $buildingId): Response
    {
        return $this->connector->send(new GetBuildingRoomsRequest($buildingId));
    }
}
