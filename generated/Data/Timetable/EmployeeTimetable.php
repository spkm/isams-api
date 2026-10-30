<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class EmployeeTimetable extends Data
{
    protected const LISTS = [
        'availability' => Availability::class,
        'forms' => EmployeeTimetableForm::class,
        'meetings' => Meeting::class,
        'sets' => EmployeeTimetableSet::class,
        'tutorials' => EmployeeTimetableTutorial::class,
    ];

    /**
     * @param  Collection<int, Availability>  $availability
     * @param  Collection<int, EmployeeTimetableForm>  $forms
     * @param  Collection<int, Meeting>  $meetings
     * @param  Collection<int, EmployeeTimetableSet>  $sets
     * @param  Collection<int, EmployeeTimetableTutorial>  $tutorials
     */
    public function __construct(
        public Collection $availability = new Collection,
        public ?string $employeeSurname = null,
        public ?string $employeeTitle = null,
        public Collection $forms = new Collection,
        public Collection $meetings = new Collection,
        public Collection $sets = new Collection,
        public ?int $timetableId = null,
        public Collection $tutorials = new Collection,
    ) {
    }
}
