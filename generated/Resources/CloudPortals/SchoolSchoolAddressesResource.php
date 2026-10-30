<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\SchoolAddresses\GetSchoolAddressListRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\SchoolAddresses\GetSchoolAddressRequest;

class SchoolSchoolAddressesResource extends BaseResource
{
    public function getSchoolAddress(int $id): Response
    {
        return $this->connector->send(new GetSchoolAddressRequest($id));
    }

    public function getSchoolAddressList(): Response
    {
        return $this->connector->send(new GetSchoolAddressListRequest());
    }
}
