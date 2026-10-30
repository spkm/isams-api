<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class TimetableWeek extends Data
{
    protected const LISTS = ['divisions' => SchoolDivision::class, 'timetableDays' => TimetableDay::class];

    /**
     * @param  Collection<int, SchoolDivision>  $divisions
     * @param  Collection<int, TimetableDay>  $timetableDays
     */
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?string $author = null,
        public Collection $divisions = new Collection,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
        public ?int $ordinal = null,
        public ?string $shortName = null,
        public ?bool $showTimetable = null,
        public Collection $timetableDays = new Collection,
    ) {
    }
}
