<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;

class DisciplineGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\DisciplineManager\Detentions\Session>
     */
    public function detentions(DateTimeInterface $startDate, DateTimeInterface $endDate): LazyCollection
    {
        return $this->run('Discipline_GetDetentions', \spkm\IsamsApi\Data\Batch\DisciplineManager\Detentions\Session::class, ['module' => 'Discipline', 'element' => 'Detentions', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\DisciplineManager\DetentionsThisMonth\Session>
     */
    public function detentionsThisMonth(): LazyCollection
    {
        return $this->run('Discipline_GetDetentionsThisMonth', \spkm\IsamsApi\Data\Batch\DisciplineManager\DetentionsThisMonth\Session::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\DisciplineManager\DetentionsThisTerm\Session>
     */
    public function detentionsThisTerm(): LazyCollection
    {
        return $this->run('Discipline_GetDetentionsThisTerm', \spkm\IsamsApi\Data\Batch\DisciplineManager\DetentionsThisTerm\Session::class);
    }
}
