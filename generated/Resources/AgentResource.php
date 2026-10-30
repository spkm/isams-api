<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\Agent\AgentsResource;

class AgentResource extends BaseResource
{
    public function agents(): AgentsResource
    {
        return new AgentsResource($this->connector);
    }
}
