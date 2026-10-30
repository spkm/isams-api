<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RightToWorkCheckTypes\GetRightToWorkCheckTypesRequest;

class RightToWorkCheckTypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetRightToWorkCheckTypesRequest());
    }
}
