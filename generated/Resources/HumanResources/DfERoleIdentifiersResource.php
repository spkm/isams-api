<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\HumanResources\DfERoleIdentifiers\GetDfERoleIdentifiersRequest;

class DfERoleIdentifiersResource extends BaseResource
{
    public function getDfERoleIdentifiers(): Response
    {
        return $this->connector->send(new GetDfERoleIdentifiersRequest());
    }
}
