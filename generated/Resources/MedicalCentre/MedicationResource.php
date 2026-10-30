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
    public function getMedicalMedicationLocations(): Response
    {
        return $this->connector->send(new GetMedicalMedicationLocationsRequest());
    }

    public function getMedicalMedicationSuppliers(): Response
    {
        return $this->connector->send(new GetMedicalMedicationSuppliersRequest());
    }

    public function getMedicalMedicationTypes(): Response
    {
        return $this->connector->send(new GetMedicalMedicationTypesRequest());
    }
}
