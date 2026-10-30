<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\School\School;
use spkm\IsamsApi\Requests\CloudPortals\School\Schools\GetPortalSchoolsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SchoolsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\School\School>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Schools\GetPortalSchoolsRequest
     */
    public function all(?string $queryValue = null): LazyCollection
    {
        return $this->each(new GetPortalSchoolsRequest(queryValue: $queryValue), School::class);
    }
}
