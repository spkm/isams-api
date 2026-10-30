<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RightToWorkCheckTypes\GetRightToWorkCheckTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RightToWorkCheckTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\RightToWorkCheckType>
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RightToWorkCheckTypes\GetRightToWorkCheckTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetRightToWorkCheckTypesRequest());
    }
}
