<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\School\SchoolAddress;
use spkm\IsamsApi\Requests\CloudPortals\School\Addresses\GetSchoolAddressListRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Addresses\GetSchoolAddressRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AddressesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Addresses\GetSchoolAddressRequest
     */
    public function get(int $id): SchoolAddress
    {
        return $this->fetch(new GetSchoolAddressRequest(id: $id));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\SchoolAddress>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Addresses\GetSchoolAddressListRequest
     */
    public function getList(): Collection
    {
        return $this->fetch(new GetSchoolAddressListRequest());
    }
}
