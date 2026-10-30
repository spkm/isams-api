<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\CheckStatuses\GetCheckStatusesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CheckStatusesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\DisclosureProbationCheckStatus>
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\CheckStatuses\GetCheckStatusesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetCheckStatusesRequest());
    }
}
