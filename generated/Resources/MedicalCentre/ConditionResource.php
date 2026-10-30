<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\MedicalCentre\Condition\GetMedicalConditionSeveritiesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Condition\GetMedicalConditionTypesRequest;

class ConditionResource extends BaseResource
{
    public function getMedicalConditionSeverities(): Response
    {
        return $this->connector->send(new GetMedicalConditionSeveritiesRequest());
    }

    public function getMedicalConditionTypes(): Response
    {
        return $this->connector->send(new GetMedicalConditionTypesRequest());
    }
}
