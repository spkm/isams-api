<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Data\WellbeingManager\Configuration;
use spkm\IsamsApi\Requests\WellbeingManager\Configuration\GetWellbeingConfigurationRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ConfigurationResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Configuration\GetWellbeingConfigurationRequest
     */
    public function get(): ?Configuration
    {
        return $this->fetch(new GetWellbeingConfigurationRequest());
    }
}
