<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\CoverManager\Agencies\Agency;
use spkm\IsamsApi\Data\Batch\CoverManager\CoverStaff\Teacher;
use spkm\IsamsApi\Data\Batch\CoverManager\LessonSuspensions\LessonSuspension;
use spkm\IsamsApi\Data\Batch\CoverManager\RoomClosures\RoomClosure;

class CoverGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CoverManager\AbsenceReasons\Reason>
     */
    public function absenceReasons(): Collection
    {
        return $this->run('Cover_GetAllAbsenceReasons', \spkm\IsamsApi\Data\Batch\CoverManager\AbsenceReasons\Reason::class);
    }

    /**
     * @return Collection<int, Agency>
     */
    public function agencies(): Collection
    {
        return $this->run('Cover_GetAllAgencies', Agency::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CoverManager\EventReasons\Reason>
     */
    public function eventReasons(): Collection
    {
        return $this->run('Cover_GetAllEventReasons', \spkm\IsamsApi\Data\Batch\CoverManager\EventReasons\Reason::class);
    }

    /**
     * @return Collection<int, LessonSuspension>
     */
    public function lessonSuspensions(DateTimeInterface $startDate, DateTimeInterface $endDate): Collection
    {
        return $this->run('Cover_GetAllLessonSuspensions', LessonSuspension::class, ['module' => 'CoverManager', 'element' => 'AllLessonSuspensions', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CoverManager\RoomClosureReasons\Reason>
     */
    public function roomClosureReasons(): Collection
    {
        return $this->run('Cover_GetAllRoomClosureReasons', \spkm\IsamsApi\Data\Batch\CoverManager\RoomClosureReasons\Reason::class);
    }

    /**
     * @return Collection<int, RoomClosure>
     */
    public function roomClosuresAndCover(DateTimeInterface $startDate, DateTimeInterface $endDate): Collection
    {
        return $this->run('Cover_GetAllRoomClosuresAndCover', RoomClosure::class, ['module' => 'CoverManager', 'element' => 'AllRoomClosuresAndCover', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return Collection<int, Teacher>
     */
    public function staff(): Collection
    {
        return $this->run('Cover_GetAllCoverStaff', Teacher::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CoverManager\UnavailableReasons\Reason>
     */
    public function unavailableReasons(): Collection
    {
        return $this->run('Cover_GetAllUnavailableReasons', \spkm\IsamsApi\Data\Batch\CoverManager\UnavailableReasons\Reason::class);
    }
}
