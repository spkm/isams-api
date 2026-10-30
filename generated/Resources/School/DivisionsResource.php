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
    public function all(string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetDivisionsRequest($filter));
    }

    public function get(string $code): Response
    {
        return $this->connector->send(new GetDivisionRequest($code));
    }
}
