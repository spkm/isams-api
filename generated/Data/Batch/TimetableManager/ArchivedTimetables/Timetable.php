<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\ArchivedTimetables;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Timetable extends BatchData
{
    protected const LISTS = [
        'schedules' => Schedule::class,
        'staffMeetings' => StaffMeeting::class,
        'tutorials' => Tutorial::class,
        'yearSchedules' => YearSchedule::class,
    ];

    /**
     * @param  Collection<int, Schedule>  $schedules
     * @param  Collection<int, StaffMeeting>  $staffMeetings
     * @param  Collection<int, Tutorial>  $tutorials
     * @param  Collection<int, YearSchedule>  $yearSchedules
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?int $startYear = null,
        public ?int $endYear = null,
        public ?bool $type = null,
        public ?string $version = null,
        public ?string $author = null,
        public ?CarbonImmutable $created = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $schedules = new Collection,
        public Collection $staffMeetings = new Collection,
        public Collection $tutorials = new Collection,
        public Collection $yearSchedules = new Collection,
    ) {
    }
}
