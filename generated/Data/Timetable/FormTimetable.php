<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class FormTimetable extends Data
{
    protected const LISTS = ['forms' => FormTimetableForm::class];

    /**
     * @param  Collection<int, FormTimetableForm>  $forms
     */
    public function __construct(
        public Collection $forms = new Collection,
        public ?int $timetableId = null,
        public ?int $year = null,
        public ?string $yearCode = null,
        public ?string $yearName = null,
    ) {
    }
}
