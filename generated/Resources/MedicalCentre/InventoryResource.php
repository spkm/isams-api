<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\MedicalCentre\Inventory\GetMedicalInventoryTypesRequest;

class InventoryResource extends BaseResource
{
    public function getTypes(): Response
    {
        return $this->connector->send(new GetMedicalInventoryTypesRequest());
    }
}
