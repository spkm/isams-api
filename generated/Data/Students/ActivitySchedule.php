<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ActivitySchedule extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $absentReason = null,
        public ?bool $allDayEvent = null,
        public ?bool $cancelled = null,
        public ?CarbonImmutable $endTime = null,
        public ?string $location = null,
        public ?int $minutesLate = null,
        public ?string $notes = null,
        public ?CarbonImmutable $occurrenceDate = null,
        public ?bool $present = null,
        public ?int $pupilCount = null,
        public ?string $registrationCode = null,
        public ?CarbonImmutable $startTime = null,
        public ?int $status = null,
        public ?string $subject = null,
    ) {
    }
}
