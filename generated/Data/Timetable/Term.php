<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Term extends Data
{
    protected const LISTS = ['dates' => CalendarDate::class];

    /**
     * @param  Collection<int, CalendarDate>  $dates
     */
    public function __construct(
        public ?int $id = null,
        public ?int $academicYear = null,
        public Collection $dates = new Collection,
        public ?CarbonImmutable $endDate = null,
        public ?string $name = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
