<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\TeachingManager\Departments\Department;
use spkm\IsamsApi\Data\Batch\TeachingManager\SetLists\SetList;
use spkm\IsamsApi\Data\Batch\TeachingManager\Sets\Set;
use spkm\IsamsApi\Data\Batch\TeachingManager\TeachingForms\TeachingForm;

class TeachingGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, Department>
     */
    public function departmentsAndSubjects(): LazyCollection
    {
        return $this->run('Teaching_GetDepartmentsAndSubjects', Department::class);
    }

    /**
     * @return LazyCollection<int, TeachingForm>
     */
    public function forms(): LazyCollection
    {
        return $this->run('Teaching_GetTeachingForms', TeachingForm::class);
    }

    /**
     * @return LazyCollection<int, SetList>
     */
    public function setLists(): LazyCollection
    {
        return $this->run('Teaching_GetTeachingSetLists', SetList::class);
    }

    /**
     * @return LazyCollection<int, Set>
     */
    public function sets(): LazyCollection
    {
        return $this->run('Teaching_GetTeachingSets', Set::class);
    }
}
