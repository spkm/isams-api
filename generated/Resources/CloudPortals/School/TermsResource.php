<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\School\Terms\GetPortalSchoolTermsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class TermsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\Term>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Terms\GetPortalSchoolTermsRequest
     */
    public function all(string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetPortalSchoolTermsRequest(filter: $filter));
    }
}
