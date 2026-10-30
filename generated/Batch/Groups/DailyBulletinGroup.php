<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\DailyBulletin\Categories\Category;

class DailyBulletinGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\DailyBulletin\Bulletins\Bulletin>
     */
    public function all(DateTimeInterface $startDate, DateTimeInterface $endDate): LazyCollection
    {
        return $this->run('DailyBulletin_GetDailyBulletins', \spkm\IsamsApi\Data\Batch\DailyBulletin\Bulletins\Bulletin::class, ['module' => 'DailyBulletin', 'element' => 'DailyBulletins', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, Category>
     */
    public function categories(): LazyCollection
    {
        return $this->run('DailyBulletin_GetAllCategories', Category::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\DailyBulletin\TodaysDailyBulletins\Bulletin>
     */
    public function today(): LazyCollection
    {
        return $this->run('DailyBulletin_GetTodaysDailyBulletins', \spkm\IsamsApi\Data\Batch\DailyBulletin\TodaysDailyBulletins\Bulletin::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\DailyBulletin\TomorrowsDailyBulletins\Bulletin>
     */
    public function tomorrow(): LazyCollection
    {
        return $this->run('DailyBulletin_GetTomorrowsDailyBulletins', \spkm\IsamsApi\Data\Batch\DailyBulletin\TomorrowsDailyBulletins\Bulletin::class);
    }
}
