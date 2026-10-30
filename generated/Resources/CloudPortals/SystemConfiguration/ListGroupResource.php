<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\ListGroup\GetListGroupsRequest;

class ListGroupResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetListGroupsRequest());
    }
}
