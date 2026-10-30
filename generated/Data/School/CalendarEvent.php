<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\School;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class CalendarEvent extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $allDayEvent = null,
        public ?string $author = null,
        public ?string $calendarName = null,
        public ?string $category = null,
        public ?string $description = null,
        public ?CarbonImmutable $endDate = null,
        public ?CarbonImmutable $endTime = null,
        public ?string $location = null,
        public ?string $notes = null,
        public ?bool $recurringEvent = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $startTime = null,
        public ?string $subCategory = null,
        public ?string $tags = null,
    ) {
    }
}
