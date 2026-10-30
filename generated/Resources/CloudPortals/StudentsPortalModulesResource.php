<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Students\PortalModules\GetPortalModuleCapabilitiesRequest;

class StudentsPortalModulesResource extends BaseResource
{
    public function getPortalModuleCapabilities(): Response
    {
        return $this->connector->send(new GetPortalModuleCapabilitiesRequest());
    }
}
