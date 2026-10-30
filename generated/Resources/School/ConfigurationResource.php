<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\School\Configuration\GetSchoolDetailsRequest;

class ConfigurationResource extends BaseResource
{
    public function getSchoolDetails(): Response
    {
        return $this->connector->send(new GetSchoolDetailsRequest());
    }
}
