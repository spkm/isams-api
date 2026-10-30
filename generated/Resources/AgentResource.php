<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Agent\GetAgentsRequest;

class AgentResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Agent\Agent>
     * @see \spkm\IsamsApi\Requests\Agent\GetAgentsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetAgentsRequest());
    }
}
