<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\OtherSchools\ProfessionsResource;
use spkm\IsamsApi\Resources\OtherSchools\SchoolsResource;

class OtherSchoolsResource extends BaseResource
{
    public function professions(): ProfessionsResource
    {
        return new ProfessionsResource($this->connector);
    }

    public function schools(): SchoolsResource
    {
        return new SchoolsResource($this->connector);
    }
}
