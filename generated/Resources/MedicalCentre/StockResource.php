<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\MedicalCentre\Stock\GetMedicalStockReasonsRequest;

class StockResource extends BaseResource
{
    public function getMedicalStockReasons(): Response
    {
        return $this->connector->send(new GetMedicalStockReasonsRequest());
    }
}
