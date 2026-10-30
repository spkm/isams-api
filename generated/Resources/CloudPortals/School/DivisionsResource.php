<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Divisions\GetDivisionListRequest;

class DivisionsResource extends BaseResource
{
    public function getList(): Response
    {
        return $this->connector->send(new GetDivisionListRequest());
    }
}
