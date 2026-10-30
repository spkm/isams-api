<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Addresses\GetSchoolAddressListRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Addresses\GetSchoolAddressRequest;

class AddressesResource extends BaseResource
{
    public function get(int $id): Response
    {
        return $this->connector->send(new GetSchoolAddressRequest($id));
    }

    public function getList(): Response
    {
        return $this->connector->send(new GetSchoolAddressListRequest());
    }
}
