<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use spkm\IsamsApi\Data\School\SchoolDetails;
use spkm\IsamsApi\Requests\School\Configuration\GetSchoolDetailsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ConfigurationResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\School\Configuration\GetSchoolDetailsRequest
     */
    public function getSchoolDetails(): ?SchoolDetails
    {
        return $this->fetch(new GetSchoolDetailsRequest());
    }
}
