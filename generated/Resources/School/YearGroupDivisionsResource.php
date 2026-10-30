<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\School\YearGroupDivisions\GetYearGroupDivisionsRequest;

class YearGroupDivisionsResource extends BaseResource
{
    public function all(int $id): Response
    {
        return $this->connector->send(new GetYearGroupDivisionsRequest($id));
    }
}
