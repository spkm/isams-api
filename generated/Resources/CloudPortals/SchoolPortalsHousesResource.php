<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalsHouses\GetPortalsHousesRequest;

class SchoolPortalsHousesResource extends BaseResource
{
    public function getPortalsHouses(?string $houseType = null): Response
    {
        return $this->connector->send(new GetPortalsHousesRequest($houseType));
    }
}
