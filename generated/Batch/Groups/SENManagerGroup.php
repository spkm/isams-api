<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\SENManager\Lessons\Lesson;
use spkm\IsamsApi\Data\Batch\SENManager\Requirements\Type;

class SENManagerGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\SENManager\ExternalExams\Exam>
     */
    public function externalExams(): LazyCollection
    {
        return $this->run('SENManager_GetExternalExams', \spkm\IsamsApi\Data\Batch\SENManager\ExternalExams\Exam::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\SENManager\GiftedAndTalented\Register>
     */
    public function giftedAndTalentedRegister(): LazyCollection
    {
        return $this->run('SENManager_GetGiftedAndTalentedRegister', \spkm\IsamsApi\Data\Batch\SENManager\GiftedAndTalented\Register::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\SENManager\InternalExams\Exam>
     */
    public function internalExams(): LazyCollection
    {
        return $this->run('SENManager_GetInternalExams', \spkm\IsamsApi\Data\Batch\SENManager\InternalExams\Exam::class);
    }

    /**
     * @return LazyCollection<int, Lesson>
     */
    public function senLessons(): LazyCollection
    {
        return $this->run('SENManager_GetSENLessons', Lesson::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\SENManager\SEN\Register>
     */
    public function senRegister(): LazyCollection
    {
        return $this->run('SENManager_GetSENRegister', \spkm\IsamsApi\Data\Batch\SENManager\SEN\Register::class);
    }

    /**
     * @return LazyCollection<int, Type>
     */
    public function types(): LazyCollection
    {
        return $this->run('SENManager_GetTypes', Type::class);
    }
}
