<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;

class HumanResourcesGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\HRManager\CurrentStaff\StaffMember>
     */
    public function currentStaff(): Collection
    {
        return $this->run('HumanResources_GetCurrentStaff', \spkm\IsamsApi\Data\Batch\HRManager\CurrentStaff\StaffMember::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\HRManager\CurrentStaff\StaffMember>
     */
    public function currentStaffWithCustomFields(): Collection
    {
        return $this->run('HumanResources_GetCurrentStaffWithCustomFields', \spkm\IsamsApi\Data\Batch\HRManager\CurrentStaff\StaffMember::class);
    }
}
