<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\School\SchoolTermsPortal\GetPortalSchoolTermsRequest;

class SchoolSchoolTermsPortalResource extends BaseResource
{
    public function getPortalSchoolTerms(string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetPortalSchoolTermsRequest($filter));
    }
}
