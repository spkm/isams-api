<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\HumanResources\DfEContractTypes\GetDfEContractTypesRequest;

class DfEContractTypesResource extends BaseResource
{
    public function getDfEContractTypes(): Response
    {
        return $this->connector->send(new GetDfEContractTypesRequest());
    }
}
