<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Schools\GetPortalSchoolsRequest;

class SchoolsResource extends BaseResource
{
    public function all(?string $queryValue = null, ?int $page = null, ?int $pageSize = null): Response
    {
        return $this->connector->send(new GetPortalSchoolsRequest($queryValue, $page, $pageSize));
    }
}
