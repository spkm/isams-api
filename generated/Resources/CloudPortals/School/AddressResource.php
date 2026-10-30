<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use spkm\IsamsApi\Requests\CloudPortals\School\Address\GetAddressDetailsByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Address\GetAddressListByPostcodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Address\GetAddressPostcodeFinderActiveRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AddressResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Address\GetAddressDetailsByIdRequest
     */
    public function getDetails(string $id): mixed
    {
        return $this->fetch(new GetAddressDetailsByIdRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Address\GetAddressListByPostcodeRequest
     */
    public function getListByPostcode(?string $postcode = null): mixed
    {
        return $this->fetch(new GetAddressListByPostcodeRequest(postcode: $postcode));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Address\GetAddressPostcodeFinderActiveRequest
     */
    public function getPostcodeFinderActive(): mixed
    {
        return $this->fetch(new GetAddressPostcodeFinderActiveRequest());
    }
}
