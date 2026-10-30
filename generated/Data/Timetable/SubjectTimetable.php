<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class SubjectTimetable extends Data
{
    protected const LISTS = ['forms' => SubjectTimetableForm::class, 'sets' => SubjectTimetableSet::class];

    /**
     * @param  Collection<int, SubjectTimetableForm>  $forms
     * @param  Collection<int, SubjectTimetableSet>  $sets
     */
    public function __construct(
        public Collection $forms = new Collection,
        public Collection $sets = new Collection,
        public ?int $timetableId = null,
    ) {
    }
}
