<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\MedicalCentre\Condition\GetMedicalConditionSeveritiesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Condition\GetMedicalConditionTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ConditionResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\ConditionSeverity>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Condition\GetMedicalConditionSeveritiesRequest
     */
    public function getSeverities(): Collection
    {
        return $this->fetch(new GetMedicalConditionSeveritiesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\ConditionType>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Condition\GetMedicalConditionTypesRequest
     */
    public function getTypes(): Collection
    {
        return $this->fetch(new GetMedicalConditionTypesRequest());
    }
}
