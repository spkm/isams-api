<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\SENManager\Lessons\Lesson;
use spkm\IsamsApi\Data\Batch\SENManager\Requirements\Type;

class SENManagerGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\SENManager\ExternalExams\Exam>
     */
    public function externalExams(): Collection
    {
        return $this->run('SENManager_GetExternalExams', \spkm\IsamsApi\Data\Batch\SENManager\ExternalExams\Exam::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\SENManager\GiftedAndTalented\Register>
     */
    public function giftedAndTalentedRegister(): Collection
    {
        return $this->run('SENManager_GetGiftedAndTalentedRegister', \spkm\IsamsApi\Data\Batch\SENManager\GiftedAndTalented\Register::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\SENManager\InternalExams\Exam>
     */
    public function internalExams(): Collection
    {
        return $this->run('SENManager_GetInternalExams', \spkm\IsamsApi\Data\Batch\SENManager\InternalExams\Exam::class);
    }

    /**
     * @return Collection<int, Lesson>
     */
    public function senLessons(): Collection
    {
        return $this->run('SENManager_GetSENLessons', Lesson::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\SENManager\SEN\Register>
     */
    public function senRegister(): Collection
    {
        return $this->run('SENManager_GetSENRegister', \spkm\IsamsApi\Data\Batch\SENManager\SEN\Register::class);
    }

    /**
     * @return Collection<int, Type>
     */
    public function types(): Collection
    {
        return $this->run('SENManager_GetTypes', Type::class);
    }
}
