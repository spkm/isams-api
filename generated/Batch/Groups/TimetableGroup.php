<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\TimetableManager\PrepTimetable\PrepTimetable;
use spkm\IsamsApi\Data\Batch\TimetableManager\Structure\Week;
use spkm\IsamsApi\Data\Batch\TimetableManager\Timetable\Pupils;
use spkm\IsamsApi\Data\Batch\TimetableManager\TimetableAllocations\TimetableAllocation;

class TimetableGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\TimetableManager\ArchivedTimetables\Timetable>
     */
    public function archived(): Collection
    {
        return $this->run('Timetable_GetArchivedTimetables', \spkm\IsamsApi\Data\Batch\TimetableManager\ArchivedTimetables\Timetable::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\TimetableManager\DevelopmentTimetables\Timetable>
     */
    public function development(): Collection
    {
        return $this->run('Timetable_GetDevelopmentTimetables', \spkm\IsamsApi\Data\Batch\TimetableManager\DevelopmentTimetables\Timetable::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\TimetableManager\PreliminaryTimetables\Timetable>
     */
    public function preliminary(): Collection
    {
        return $this->run('Timetable_GetPreliminaryTimetables', \spkm\IsamsApi\Data\Batch\TimetableManager\PreliminaryTimetables\Timetable::class);
    }

    /**
     * @return Collection<int, PrepTimetable>
     */
    public function prep(): Collection
    {
        return $this->run('Timetable_GetPrepTimetables', PrepTimetable::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\TimetableManager\PublishedTimetables\Timetable>
     */
    public function published(): Collection
    {
        return $this->run('Timetable_GetPublishedTimetables', \spkm\IsamsApi\Data\Batch\TimetableManager\PublishedTimetables\Timetable::class);
    }

    /**
     * @return Collection<int, Pupils>
     */
    public function pupils(): Collection
    {
        return $this->run('Timetable_GetPupilTimetables', Pupils::class);
    }

    /**
     * @return Collection<int, Week>
     */
    public function structure(): Collection
    {
        return $this->run('Timetable_GetTimetableStructure', Week::class);
    }

    /**
     * @return Collection<int, TimetableAllocation>
     */
    public function weekAllocations(): Collection
    {
        return $this->run('Timetable_GetTimetableWeekAllocations', TimetableAllocation::class);
    }
}
