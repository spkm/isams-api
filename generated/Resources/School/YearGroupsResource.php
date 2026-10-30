<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\School\YearGroups\GetYearGroupRequest;
use spkm\IsamsApi\Requests\School\YearGroups\GetYearGroupsRequest;

class YearGroupsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetYearGroupsRequest());
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetYearGroupRequest($id));
    }
}
