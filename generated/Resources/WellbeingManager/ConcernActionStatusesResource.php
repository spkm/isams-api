<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\WellbeingManager\ActionStatus;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionStatuses\GetConcernActionStatusRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionStatuses\GetConcernActionStatusesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ConcernActionStatusesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ActionStatus>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionStatuses\GetConcernActionStatusesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetConcernActionStatusesRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionStatuses\GetConcernActionStatusRequest
     */
    public function get(int $id): ActionStatus
    {
        return $this->fetch(new GetConcernActionStatusRequest(id: $id));
    }
}
