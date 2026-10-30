<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\School\Divisions\GetDivisionRequest;
use spkm\IsamsApi\Requests\School\Divisions\GetDivisionsRequest;

class DivisionsResource extends BaseResource
{
    public function getDivision(string $code): Response
    {
        return $this->connector->send(new GetDivisionRequest($code));
    }

    public function getDivisions(string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetDivisionsRequest($filter));
    }
}
