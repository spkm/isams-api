<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationCompleteToRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationSchedulesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationStatusesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationTypesRequest;

class VaccinationResource extends BaseResource
{
    public function getCompleteTo(): Response
    {
        return $this->connector->send(new GetMedicalVaccinationCompleteToRequest());
    }

    public function getSchedules(): Response
    {
        return $this->connector->send(new GetMedicalVaccinationSchedulesRequest());
    }

    public function getStatuses(): Response
    {
        return $this->connector->send(new GetMedicalVaccinationStatusesRequest());
    }

    public function getTypes(): Response
    {
        return $this->connector->send(new GetMedicalVaccinationTypesRequest());
    }
}
