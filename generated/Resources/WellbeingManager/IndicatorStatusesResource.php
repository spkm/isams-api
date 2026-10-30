<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\WellbeingManager\IndicatorStatuses\GetIndicatorStatusesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class IndicatorStatusesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\IndicatorStatus>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\IndicatorStatuses\GetIndicatorStatusesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetIndicatorStatusesRequest());
    }
}
