<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\MedicalCentre\Medication\GetMedicalMedicationLocationsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Medication\GetMedicalMedicationSuppliersRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Medication\GetMedicalMedicationTypesRequest;

class MedicationResource extends BaseResource
{
    public function getLocations(): Response
    {
        return $this->connector->send(new GetMedicalMedicationLocationsRequest());
    }

    public function getSuppliers(): Response
    {
        return $this->connector->send(new GetMedicalMedicationSuppliersRequest());
    }

    public function getTypes(): Response
    {
        return $this->connector->send(new GetMedicalMedicationTypesRequest());
    }
}
