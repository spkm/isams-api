<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationCompleteToRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationSchedulesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationStatusesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VaccinationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\VaccinationCompleteTo>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationCompleteToRequest
     */
    public function getCompleteTo(): Collection
    {
        return $this->fetch(new GetMedicalVaccinationCompleteToRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\VaccinationSchedule>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationSchedulesRequest
     */
    public function getSchedules(): Collection
    {
        return $this->fetch(new GetMedicalVaccinationSchedulesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\VaccinationStatus>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationStatusesRequest
     */
    public function getStatuses(): Collection
    {
        return $this->fetch(new GetMedicalVaccinationStatusesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Vaccination>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationTypesRequest
     */
    public function getTypes(): Collection
    {
        return $this->fetch(new GetMedicalVaccinationTypesRequest());
    }
}
