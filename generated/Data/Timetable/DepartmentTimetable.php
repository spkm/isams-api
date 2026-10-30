<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class DepartmentTimetable extends Data
{
    protected const LISTS = ['forms' => DepartmentTimetableForm::class, 'sets' => DepartmentTimetableSet::class];

    /**
     * @param  Collection<int, DepartmentTimetableForm>  $forms
     * @param  Collection<int, DepartmentTimetableSet>  $sets
     */
    public function __construct(
        public Collection $forms = new Collection,
        public Collection $sets = new Collection,
        public ?int $timetableId = null,
    ) {
    }
}
