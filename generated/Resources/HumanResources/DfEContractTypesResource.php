<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\HumanResources\DfEContractTypes\GetDfEContractTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DfEContractTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\ContractType>
     * @see \spkm\IsamsApi\Requests\HumanResources\DfEContractTypes\GetDfEContractTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetDfEContractTypesRequest());
    }
}
