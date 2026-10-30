<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\OutstandingTasks\GetOutstandingTasksRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class OutstandingTasksResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\OutstandingTaskSummary>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\OutstandingTasks\GetOutstandingTasksRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetOutstandingTasksRequest());
    }
}
