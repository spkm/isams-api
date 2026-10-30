<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalsYearGroups\GetPortalsYearGroupsRequest;

class SchoolPortalsYearGroupsResource extends BaseResource
{
    public function getPortalsYearGroups(): Response
    {
        return $this->connector->send(new GetPortalsYearGroupsRequest());
    }
}
