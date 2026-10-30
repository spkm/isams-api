<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\MedicalCentre\Stock\GetMedicalStockReasonsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StockResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\StockReason>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Stock\GetMedicalStockReasonsRequest
     */
    public function getReasons(): Collection
    {
        return $this->fetch(new GetMedicalStockReasonsRequest());
    }
}
