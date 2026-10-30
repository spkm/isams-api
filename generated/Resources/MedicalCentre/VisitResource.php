<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitArriveFromRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitDepartToRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitLocationsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitReasonsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitTransportOptionsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VisitResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\VisitArriveFrom>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitArriveFromRequest
     */
    public function getArriveFrom(): Collection
    {
        return $this->fetch(new GetMedicalVisitArriveFromRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\VisitDepartTo>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitDepartToRequest
     */
    public function getDepartTo(): Collection
    {
        return $this->fetch(new GetMedicalVisitDepartToRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\VisitLocation>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitLocationsRequest
     */
    public function getLocations(): Collection
    {
        return $this->fetch(new GetMedicalVisitLocationsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\VisitReason>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitReasonsRequest
     */
    public function getReasons(): Collection
    {
        return $this->fetch(new GetMedicalVisitReasonsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\VisitTransportOption>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitTransportOptionsRequest
     */
    public function getTransportOptions(): Collection
    {
        return $this->fetch(new GetMedicalVisitTransportOptionsRequest());
    }
}
