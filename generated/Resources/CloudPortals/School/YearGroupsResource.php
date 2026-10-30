<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\YearGroups\GetYearGroupsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class YearGroupsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\YearGroup>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\YearGroups\GetYearGroupsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetYearGroupsRequest());
    }
}
