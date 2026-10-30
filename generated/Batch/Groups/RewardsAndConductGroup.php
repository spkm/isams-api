<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\RewardsAndConduct\Fields\Field;
use spkm\IsamsApi\Data\Batch\RewardsAndConduct\Records\Record;
use spkm\IsamsApi\Data\Batch\RewardsAndConduct\Types\Type;

class RewardsAndConductGroup extends BatchGroup
{
    /**
     * @return Collection<int, Field>
     */
    public function fields(): Collection
    {
        return $this->run('RewardsAndConduct_GetFields', Field::class);
    }

    /**
     * @return Collection<int, Record>
     */
    public function records(DateTimeInterface $startDate, DateTimeInterface $endDate): Collection
    {
        return $this->run('RewardsAndConduct_GetRecords', Record::class, ['module' => 'RewardsAndConduct', 'element' => 'Records', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return Collection<int, Type>
     */
    public function rewardsTypes(): Collection
    {
        return $this->run('RewardsAndConduct_GetRewardsTypes', Type::class);
    }
}
