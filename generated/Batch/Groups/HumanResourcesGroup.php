<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\HRManager\CurrentStaff\StaffMember;

class HumanResourcesGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, StaffMember>
     */
    public function currentStaff(): LazyCollection
    {
        return $this->run('HumanResources_GetCurrentStaff', StaffMember::class);
    }

    /**
     * @return LazyCollection<int, StaffMember>
     */
    public function currentStaffWithCustomFields(): LazyCollection
    {
        return $this->run('HumanResources_GetCurrentStaffWithCustomFields', StaffMember::class);
    }
}
