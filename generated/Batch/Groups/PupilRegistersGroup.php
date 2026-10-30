<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\PupilRegisters\FreeSchoolMeals\FreeSchoolMeal;
use spkm\IsamsApi\Data\Batch\PupilRegisters\SENLessons\Lesson;
use spkm\IsamsApi\Data\Batch\PupilRegisters\SENTypes\Type;

class PupilRegistersGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, FreeSchoolMeal>
     */
    public function freeSchoolMeals(DateTimeInterface $startDate, DateTimeInterface $endDate): LazyCollection
    {
        return $this->run('PupilRegisters_GetFreeSchoolMeals', FreeSchoolMeal::class, ['module' => 'PupilRegisters', 'element' => 'FreeSchoolMeals', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilRegisters\GiftedAndTalentedRegister\Register>
     */
    public function giftedAndTalentedRegister(array $systemStatusesToInclude): LazyCollection
    {
        return $this->run('PupilRegisters_GetGiftedAndTalentedRegister', \spkm\IsamsApi\Data\Batch\PupilRegisters\GiftedAndTalentedRegister\Register::class, ['module' => 'PupilRegisters', 'element' => 'GiftedAndTalentedRegister', 'attributes' => ['systemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return LazyCollection<int, Lesson>
     */
    public function senLessons(array $systemStatusesToInclude): LazyCollection
    {
        return $this->run('PupilRegisters_GetSENLessons', Lesson::class, ['module' => 'PupilRegisters', 'element' => 'SENLessons', 'attributes' => ['systemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilRegisters\SENRegister\Register>
     */
    public function senRegister(array $systemStatusesToInclude): LazyCollection
    {
        return $this->run('PupilRegisters_GetSENRegister', \spkm\IsamsApi\Data\Batch\PupilRegisters\SENRegister\Register::class, ['module' => 'PupilRegisters', 'element' => 'SENRegister', 'attributes' => ['systemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return LazyCollection<int, Type>
     */
    public function senTypes(array $systemStatusesToInclude): LazyCollection
    {
        return $this->run('PupilRegisters_GetSENTypes', Type::class, ['module' => 'PupilRegisters', 'element' => 'SENTypes', 'attributes' => ['systemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }
}
