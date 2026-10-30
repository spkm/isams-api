<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\RewardsAndConduct\ModuleTypes\GetModuleTypesRequest;

class ModuleTypesResource extends BaseResource
{
    public function getModuleTypes(string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetModuleTypesRequest($filter));
    }
}
