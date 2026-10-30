<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Students\SystemStatuses\GetStudentSystemStatusesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SystemStatusesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\StudentSystemStatus>
     * @see \spkm\IsamsApi\Requests\Students\SystemStatuses\GetStudentSystemStatusesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetStudentSystemStatusesRequest());
    }
}
