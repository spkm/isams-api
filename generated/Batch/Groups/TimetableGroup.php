<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\TimetableManager\PrepTimetable\PrepTimetable;
use spkm\IsamsApi\Data\Batch\TimetableManager\Structure\Week;
use spkm\IsamsApi\Data\Batch\TimetableManager\Timetable\Pupils;
use spkm\IsamsApi\Data\Batch\TimetableManager\TimetableAllocations\TimetableAllocation;

class TimetableGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\TimetableManager\ArchivedTimetables\Timetable>
     */
    public function archived(): LazyCollection
    {
        return $this->run('Timetable_GetArchivedTimetables', \spkm\IsamsApi\Data\Batch\TimetableManager\ArchivedTimetables\Timetable::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\TimetableManager\DevelopmentTimetables\Timetable>
     */
    public function development(): LazyCollection
    {
        return $this->run('Timetable_GetDevelopmentTimetables', \spkm\IsamsApi\Data\Batch\TimetableManager\DevelopmentTimetables\Timetable::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\TimetableManager\PreliminaryTimetables\Timetable>
     */
    public function preliminary(): LazyCollection
    {
        return $this->run('Timetable_GetPreliminaryTimetables', \spkm\IsamsApi\Data\Batch\TimetableManager\PreliminaryTimetables\Timetable::class);
    }

    /**
     * @return LazyCollection<int, PrepTimetable>
     */
    public function prep(): LazyCollection
    {
        return $this->run('Timetable_GetPrepTimetables', PrepTimetable::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\TimetableManager\PublishedTimetables\Timetable>
     */
    public function published(): LazyCollection
    {
        return $this->run('Timetable_GetPublishedTimetables', \spkm\IsamsApi\Data\Batch\TimetableManager\PublishedTimetables\Timetable::class);
    }

    /**
     * @return LazyCollection<int, Pupils>
     */
    public function pupils(): LazyCollection
    {
        return $this->run('Timetable_GetPupilTimetables', Pupils::class);
    }

    /**
     * @return LazyCollection<int, Week>
     */
    public function structure(): LazyCollection
    {
        return $this->run('Timetable_GetTimetableStructure', Week::class);
    }

    /**
     * @return LazyCollection<int, TimetableAllocation>
     */
    public function weekAllocations(): LazyCollection
    {
        return $this->run('Timetable_GetTimetableWeekAllocations', TimetableAllocation::class);
    }
}
