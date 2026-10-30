<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class StudentTimetable extends Data
{
    protected const LISTS = [
        'availability' => Availability::class,
        'forms' => StudentTimetableForm::class,
        'sets' => StudentTimetableSet::class,
        'tutorials' => StudentTimetableTutorial::class,
        'yearSchedules' => StudentTimetableYearSchedule::class,
    ];

    /**
     * @param  Collection<int, Availability>  $availability
     * @param  Collection<int, StudentTimetableForm>  $forms
     * @param  Collection<int, StudentTimetableSet>  $sets
     * @param  Collection<int, StudentTimetableTutorial>  $tutorials
     * @param  Collection<int, StudentTimetableYearSchedule>  $yearSchedules
     */
    public function __construct(
        public Collection $availability = new Collection,
        public Collection $forms = new Collection,
        public Collection $sets = new Collection,
        public ?int $timetableId = null,
        public Collection $tutorials = new Collection,
        public ?int $year = null,
        public ?string $yearCode = null,
        public ?string $yearName = null,
        public Collection $yearSchedules = new Collection,
    ) {
    }
}
