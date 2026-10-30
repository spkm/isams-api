<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\MedicalCentre\Consent\GetMedicalConsentTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ConsentResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\ConsentType>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Consent\GetMedicalConsentTypesRequest
     */
    public function getTypes(): Collection
    {
        return $this->fetch(new GetMedicalConsentTypesRequest());
    }
}
