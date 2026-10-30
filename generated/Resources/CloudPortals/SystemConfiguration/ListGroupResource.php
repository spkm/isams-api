<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\ListGroup\GetListGroupsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ListGroupResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\PrivateGlobalListGroup>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\ListGroup\GetListGroupsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetListGroupsRequest());
    }
}
