<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\WellbeingManager\GirfecAreas\GetGirfecAreasRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class GirfecAreasResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\PastoralConcernArea>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\GirfecAreas\GetGirfecAreasRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetGirfecAreasRequest());
    }
}
