<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\MedicalCentre\Medication\GetMedicalMedicationLocationsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Medication\GetMedicalMedicationSuppliersRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Medication\GetMedicalMedicationTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class MedicationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicationLocation>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Medication\GetMedicalMedicationLocationsRequest
     */
    public function getLocations(): Collection
    {
        return $this->fetch(new GetMedicalMedicationLocationsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicationSupplier>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Medication\GetMedicalMedicationSuppliersRequest
     */
    public function getSuppliers(): Collection
    {
        return $this->fetch(new GetMedicalMedicationSuppliersRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicationType>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Medication\GetMedicalMedicationTypesRequest
     */
    public function getTypes(): Collection
    {
        return $this->fetch(new GetMedicalMedicationTypesRequest());
    }
}
