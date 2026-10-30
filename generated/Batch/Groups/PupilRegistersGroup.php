<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\PupilRegisters\FreeSchoolMeals\FreeSchoolMeal;
use spkm\IsamsApi\Data\Batch\PupilRegisters\SENLessons\Lesson;
use spkm\IsamsApi\Data\Batch\PupilRegisters\SENTypes\Type;

class PupilRegistersGroup extends BatchGroup
{
    /**
     * @return Collection<int, FreeSchoolMeal>
     */
    public function freeSchoolMeals(DateTimeInterface $startDate, DateTimeInterface $endDate): Collection
    {
        return $this->run('PupilRegisters_GetFreeSchoolMeals', FreeSchoolMeal::class, ['module' => 'PupilRegisters', 'element' => 'FreeSchoolMeals', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilRegisters\GiftedAndTalentedRegister\Register>
     */
    public function giftedAndTalentedRegister(array $systemStatusesToInclude): Collection
    {
        return $this->run('PupilRegisters_GetGiftedAndTalentedRegister', \spkm\IsamsApi\Data\Batch\PupilRegisters\GiftedAndTalentedRegister\Register::class, ['module' => 'PupilRegisters', 'element' => 'GiftedAndTalentedRegister', 'attributes' => ['systemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return Collection<int, Lesson>
     */
    public function senLessons(array $systemStatusesToInclude): Collection
    {
        return $this->run('PupilRegisters_GetSENLessons', Lesson::class, ['module' => 'PupilRegisters', 'element' => 'SENLessons', 'attributes' => ['systemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }

    /**
     * @param  list<int|string>|null  $systemStatusesToInclude
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilRegisters\SENRegister\Register>
     */
    public function senRegister(?array $systemStatusesToInclude = null): Collection
    {
        return $this->run('PupilRegisters_GetSENRegister', \spkm\IsamsApi\Data\Batch\PupilRegisters\SENRegister\Register::class, ['module' => 'PupilRegisters', 'element' => 'SENRegister', 'attributes' => ['systemStatusesToInclude' => $systemStatusesToInclude], 'required' => false]);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return Collection<int, Type>
     */
    public function senTypes(array $systemStatusesToInclude): Collection
    {
        return $this->run('PupilRegisters_GetSENTypes', Type::class, ['module' => 'PupilRegisters', 'element' => 'SENTypes', 'attributes' => ['systemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }
}
