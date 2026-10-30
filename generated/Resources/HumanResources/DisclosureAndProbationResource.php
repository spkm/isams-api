<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation\CheckStatusesResource;
use spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation\IdentityEvidenceTypesResource;
use spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation\QualificationEvidenceTypesResource;
use spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypesResource;
use spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation\RightToWorkCheckTypesResource;
use spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation\TypesResource;
use spkm\IsamsApi\Resources\IsamsResource;

class DisclosureAndProbationResource extends IsamsResource
{
    public function checkStatuses(): CheckStatusesResource
    {
        return new CheckStatusesResource($this->connector);
    }

    public function identityEvidenceTypes(): IdentityEvidenceTypesResource
    {
        return new IdentityEvidenceTypesResource($this->connector);
    }

    public function qualificationEvidenceTypes(): QualificationEvidenceTypesResource
    {
        return new QualificationEvidenceTypesResource($this->connector);
    }

    public function registrationEvidenceTypes(): RegistrationEvidenceTypesResource
    {
        return new RegistrationEvidenceTypesResource($this->connector);
    }

    public function rightToWorkCheckTypes(): RightToWorkCheckTypesResource
    {
        return new RightToWorkCheckTypesResource($this->connector);
    }

    public function types(): TypesResource
    {
        return new TypesResource($this->connector);
    }
}
