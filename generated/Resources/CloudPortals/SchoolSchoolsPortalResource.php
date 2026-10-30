<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\SchoolsPortal\GetPortalSchoolsRequest;

class SchoolSchoolsPortalResource extends BaseResource
{
    public function getPortalSchools(?string $queryValue = null, ?int $page = null, ?int $pageSize = null): Response
    {
        return $this->connector->send(new GetPortalSchoolsRequest($queryValue, $page, $pageSize));
    }
}
