<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\HumanResources\DfERoleIdentifiers\GetDfERoleIdentifiersRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DfERoleIdentifiersResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\RoleIdentifier>
     * @see \spkm\IsamsApi\Requests\HumanResources\DfERoleIdentifiers\GetDfERoleIdentifiersRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetDfERoleIdentifiersRequest());
    }
}
