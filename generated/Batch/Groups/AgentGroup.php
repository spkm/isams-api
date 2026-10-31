<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\AgencyManager\Agency;

class AgentGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, Agency>
     */
    public function active(): LazyCollection
    {
        return $this->run('Agent_GetActive', Agency::class);
    }

    /**
     * @return LazyCollection<int, Agency>
     */
    public function inactive(): LazyCollection
    {
        return $this->run('Agent_GetInactive', Agency::class);
    }
}
