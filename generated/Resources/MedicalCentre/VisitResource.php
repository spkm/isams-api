<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitArriveFromRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitDepartToRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitLocationsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitReasonsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitTransportOptionsRequest;

class VisitResource extends BaseResource
{
    public function getArriveFrom(): Response
    {
        return $this->connector->send(new GetMedicalVisitArriveFromRequest());
    }

    public function getDepartTo(): Response
    {
        return $this->connector->send(new GetMedicalVisitDepartToRequest());
    }

    public function getLocations(): Response
    {
        return $this->connector->send(new GetMedicalVisitLocationsRequest());
    }

    public function getReasons(): Response
    {
        return $this->connector->send(new GetMedicalVisitReasonsRequest());
    }

    public function getTransportOptions(): Response
    {
        return $this->connector->send(new GetMedicalVisitTransportOptionsRequest());
    }
}
