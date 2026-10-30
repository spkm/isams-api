<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Students\Modules\GetModuleCapabilitiesRequest;

class ModulesResource extends BaseResource
{
    public function getCapabilities(): Response
    {
        return $this->connector->send(new GetModuleCapabilitiesRequest());
    }
}
