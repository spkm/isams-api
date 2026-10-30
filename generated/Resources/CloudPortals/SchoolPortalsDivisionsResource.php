<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalsDivisions\GetPortalsDivisionListRequest;

class SchoolPortalsDivisionsResource extends BaseResource
{
    public function getPortalsDivisionList(): Response
    {
        return $this->connector->send(new GetPortalsDivisionListRequest());
    }
}
