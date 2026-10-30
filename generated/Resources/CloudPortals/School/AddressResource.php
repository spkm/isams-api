<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Address\GetAddressDetailsByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Address\GetAddressListByPostcodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Address\GetAddressPostcodeFinderActiveRequest;

class AddressResource extends BaseResource
{
    public function getDetails(string $id): Response
    {
        return $this->connector->send(new GetAddressDetailsByIdRequest($id));
    }

    public function getListByPostcode(?string $postcode = null): Response
    {
        return $this->connector->send(new GetAddressListByPostcodeRequest($postcode));
    }

    public function getPostcodeFinderActive(): Response
    {
        return $this->connector->send(new GetAddressPostcodeFinderActiveRequest());
    }
}
