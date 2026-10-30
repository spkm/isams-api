<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class CalendarDate extends Data
{
    public function __construct(
        public ?CarbonImmutable $date = null,
        public ?int $week = null,
        public ?int $weekDay = null,
        public ?int $year = null,
    ) {
    }
}
