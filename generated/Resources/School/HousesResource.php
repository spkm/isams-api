<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\School\Houses\GetHouseRequest;
use spkm\IsamsApi\Requests\School\Houses\GetHousesRequest;

class HousesResource extends BaseResource
{
    public function all(?string $houseType = null): Response
    {
        return $this->connector->send(new GetHousesRequest($houseType));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetHouseRequest($id));
    }
}
