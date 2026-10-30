<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\TeachingManager\Departments\Department;
use spkm\IsamsApi\Data\Batch\TeachingManager\SetLists\SetList;
use spkm\IsamsApi\Data\Batch\TeachingManager\Sets\Set;
use spkm\IsamsApi\Data\Batch\TeachingManager\TeachingForms\TeachingForm;

class TeachingGroup extends BatchGroup
{
    /**
     * @return Collection<int, Department>
     */
    public function departmentsAndSubjects(): Collection
    {
        return $this->run('Teaching_GetDepartmentsAndSubjects', Department::class);
    }

    /**
     * @return Collection<int, TeachingForm>
     */
    public function forms(): Collection
    {
        return $this->run('Teaching_GetTeachingForms', TeachingForm::class);
    }

    /**
     * @return Collection<int, SetList>
     */
    public function setLists(): Collection
    {
        return $this->run('Teaching_GetTeachingSetLists', SetList::class);
    }

    /**
     * @return Collection<int, Set>
     */
    public function sets(): Collection
    {
        return $this->run('Teaching_GetTeachingSets', Set::class);
    }
}
