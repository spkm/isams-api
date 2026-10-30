<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\OtherSchools;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\OtherSchools\Professions\GetProfessionsRequest;

class ProfessionsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetProfessionsRequest());
    }
}
