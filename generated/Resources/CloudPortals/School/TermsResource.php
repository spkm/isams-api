<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\School\Terms\GetPortalSchoolTermsRequest;

class TermsResource extends BaseResource
{
    public function all(string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetPortalSchoolTermsRequest($filter));
    }
}
