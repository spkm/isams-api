<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\MedicalCentre\Inventory\GetMedicalInventoryTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class InventoryResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\InventoryType>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Inventory\GetMedicalInventoryTypesRequest
     */
    public function getTypes(): Collection
    {
        return $this->fetch(new GetMedicalInventoryTypesRequest());
    }
}
