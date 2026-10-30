<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\DailyBulletin\Categories\Category;

class DailyBulletinGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\DailyBulletin\Bulletins\Bulletin>
     */
    public function all(DateTimeInterface $startDate, DateTimeInterface $endDate): Collection
    {
        return $this->run('DailyBulletin_GetDailyBulletins', \spkm\IsamsApi\Data\Batch\DailyBulletin\Bulletins\Bulletin::class, ['module' => 'DailyBulletin', 'element' => 'DailyBulletins', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return Collection<int, Category>
     */
    public function categories(): Collection
    {
        return $this->run('DailyBulletin_GetAllCategories', Category::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\DailyBulletin\TodaysDailyBulletins\Bulletin>
     */
    public function today(): Collection
    {
        return $this->run('DailyBulletin_GetTodaysDailyBulletins', \spkm\IsamsApi\Data\Batch\DailyBulletin\TodaysDailyBulletins\Bulletin::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\DailyBulletin\TomorrowsDailyBulletins\Bulletin>
     */
    public function tomorrow(): Collection
    {
        return $this->run('DailyBulletin_GetTomorrowsDailyBulletins', \spkm\IsamsApi\Data\Batch\DailyBulletin\TomorrowsDailyBulletins\Bulletin::class);
    }
}
