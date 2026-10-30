<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\WellbeingManager\Framework\GetWellbeingFrameworkModulesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FrameworkResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\Module>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Framework\GetWellbeingFrameworkModulesRequest
     */
    public function getModules(): Collection
    {
        return $this->fetch(new GetWellbeingFrameworkModulesRequest());
    }
}
