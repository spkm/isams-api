<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class RoomTimetable extends Data
{
    protected const LISTS = [
        'availability' => Availability::class,
        'forms' => RoomTimetableForm::class,
        'meetings' => RoomTimetableMeeting::class,
        'sets' => RoomTimetableSet::class,
        'tutorials' => Tutorial::class,
        'yearSchedules' => YearSchedule::class,
    ];

    /**
     * @param  Collection<int, Availability>  $availability
     * @param  Collection<int, RoomTimetableForm>  $forms
     * @param  Collection<int, RoomTimetableMeeting>  $meetings
     * @param  Collection<int, RoomTimetableSet>  $sets
     * @param  Collection<int, Tutorial>  $tutorials
     * @param  Collection<int, YearSchedule>  $yearSchedules
     */
    public function __construct(
        public Collection $availability = new Collection,
        public Collection $forms = new Collection,
        public Collection $meetings = new Collection,
        public ?string $roomCode = null,
        public ?string $roomName = null,
        public Collection $sets = new Collection,
        public ?int $timetableId = null,
        public Collection $tutorials = new Collection,
        public Collection $yearSchedules = new Collection,
    ) {
    }
}
