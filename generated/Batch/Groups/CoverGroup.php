<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\CoverManager\Agencies\Agency;
use spkm\IsamsApi\Data\Batch\CoverManager\CoverStaff\Teacher;
use spkm\IsamsApi\Data\Batch\CoverManager\LessonSuspensions\LessonSuspension;
use spkm\IsamsApi\Data\Batch\CoverManager\RoomClosures\RoomClosure;

class CoverGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CoverManager\AbsenceReasons\Reason>
     */
    public function absenceReasons(): LazyCollection
    {
        return $this->run('Cover_GetAllAbsenceReasons', \spkm\IsamsApi\Data\Batch\CoverManager\AbsenceReasons\Reason::class);
    }

    /**
     * @return LazyCollection<int, Agency>
     */
    public function agencies(): LazyCollection
    {
        return $this->run('Cover_GetAllAgencies', Agency::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CoverManager\Reason>
     */
    public function eventReasons(): LazyCollection
    {
        return $this->run('Cover_GetAllEventReasons', \spkm\IsamsApi\Data\Batch\CoverManager\Reason::class);
    }

    /**
     * @return LazyCollection<int, LessonSuspension>
     */
    public function lessonSuspensions(DateTimeInterface $startDate, DateTimeInterface $endDate): LazyCollection
    {
        return $this->run('Cover_GetAllLessonSuspensions', LessonSuspension::class, ['module' => 'CoverManager', 'element' => 'AllLessonSuspensions', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CoverManager\Reason>
     */
    public function roomClosureReasons(): LazyCollection
    {
        return $this->run('Cover_GetAllRoomClosureReasons', \spkm\IsamsApi\Data\Batch\CoverManager\Reason::class);
    }

    /**
     * @return LazyCollection<int, RoomClosure>
     */
    public function roomClosuresAndCover(DateTimeInterface $startDate, DateTimeInterface $endDate): LazyCollection
    {
        return $this->run('Cover_GetAllRoomClosuresAndCover', RoomClosure::class, ['module' => 'CoverManager', 'element' => 'AllRoomClosuresAndCover', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, Teacher>
     */
    public function staff(): LazyCollection
    {
        return $this->run('Cover_GetAllCoverStaff', Teacher::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CoverManager\Reason>
     */
    public function unavailableReasons(): LazyCollection
    {
        return $this->run('Cover_GetAllUnavailableReasons', \spkm\IsamsApi\Data\Batch\CoverManager\Reason::class);
    }
}
