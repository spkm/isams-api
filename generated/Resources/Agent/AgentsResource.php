<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Agent;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Agent\Agents\GetAgentsRequest;

class AgentsResource extends BaseResource
{
    public function getAgents(): Response
    {
        return $this->connector->send(new GetAgentsRequest());
    }
}
