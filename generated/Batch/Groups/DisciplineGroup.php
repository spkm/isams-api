<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\DisciplineManager\Session;

class DisciplineGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, Session>
     */
    public function detentions(DateTimeInterface $startDate, DateTimeInterface $endDate): LazyCollection
    {
        return $this->run('Discipline_GetDetentions', Session::class, ['module' => 'Discipline', 'element' => 'Detentions', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, Session>
     */
    public function detentionsThisMonth(): LazyCollection
    {
        return $this->run('Discipline_GetDetentionsThisMonth', Session::class);
    }

    /**
     * @return LazyCollection<int, Session>
     */
    public function detentionsThisTerm(): LazyCollection
    {
        return $this->run('Discipline_GetDetentionsThisTerm', Session::class);
    }
}
