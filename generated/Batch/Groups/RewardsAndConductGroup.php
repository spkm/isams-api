<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\RewardsAndConduct\Fields\Field;
use spkm\IsamsApi\Data\Batch\RewardsAndConduct\Records\Record;
use spkm\IsamsApi\Data\Batch\RewardsAndConduct\Types\Type;

class RewardsAndConductGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, Field>
     */
    public function fields(): LazyCollection
    {
        return $this->run('RewardsAndConduct_GetFields', Field::class);
    }

    /**
     * @return LazyCollection<int, Record>
     */
    public function records(DateTimeInterface $startDate, DateTimeInterface $endDate): LazyCollection
    {
        return $this->run('RewardsAndConduct_GetRecords', Record::class, ['module' => 'RewardsAndConduct', 'element' => 'Records', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, Type>
     */
    public function rewardsTypes(): LazyCollection
    {
        return $this->run('RewardsAndConduct_GetRewardsTypes', Type::class);
    }
}
