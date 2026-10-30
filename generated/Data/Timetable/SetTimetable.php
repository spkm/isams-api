<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class SetTimetable extends Data
{
    protected const LISTS = ['sets' => SetTimetableSet::class];

    /**
     * @param  Collection<int, SetTimetableSet>  $sets
     */
    public function __construct(
        public Collection $sets = new Collection,
        public ?int $timetableId = null,
        public ?int $year = null,
        public ?string $yearCode = null,
        public ?string $yearName = null,
    ) {
    }
}
