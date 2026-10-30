<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;

class AgentGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\AgencyManager\ActiveAgencies\Agency>
     */
    public function active(): Collection
    {
        return $this->run('Agent_GetActive', \spkm\IsamsApi\Data\Batch\AgencyManager\ActiveAgencies\Agency::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\AgencyManager\InactiveAgencies\Agency>
     */
    public function inactive(): Collection
    {
        return $this->run('Agent_GetInactive', \spkm\IsamsApi\Data\Batch\AgencyManager\InactiveAgencies\Agency::class);
    }
}
