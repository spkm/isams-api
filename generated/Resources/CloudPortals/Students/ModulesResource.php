<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Students;

use spkm\IsamsApi\Data\Framework\PortalModuleCapabilities;
use spkm\IsamsApi\Requests\CloudPortals\Students\Modules\GetModuleCapabilitiesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ModulesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Students\Modules\GetModuleCapabilitiesRequest
     */
    public function getCapabilities(): PortalModuleCapabilities
    {
        return $this->fetch(new GetModuleCapabilitiesRequest());
    }
}
