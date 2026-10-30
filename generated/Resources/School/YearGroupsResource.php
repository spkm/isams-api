<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\School\YearGroup;
use spkm\IsamsApi\Requests\School\YearGroups\GetYearGroupRequest;
use spkm\IsamsApi\Requests\School\YearGroups\GetYearGroupsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class YearGroupsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\YearGroup>
     * @see \spkm\IsamsApi\Requests\School\YearGroups\GetYearGroupsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetYearGroupsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\School\YearGroups\GetYearGroupRequest
     */
    public function get(int $id): YearGroup
    {
        return $this->fetch(new GetYearGroupRequest(id: $id));
    }
}
