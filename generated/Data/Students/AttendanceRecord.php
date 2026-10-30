<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class AttendanceRecord extends Data
{
    public function __construct(
        public ?string $ampm = null,
        public ?string $code = null,
        public ?CarbonImmutable $endDateTime = null,
        public ?bool $late = null,
        public ?int $minutesLate = null,
        public ?string $reason = null,
        public ?string $registeredBy = null,
        public ?string $registeredByForename = null,
        public ?string $registeredBySurname = null,
        public ?string $registeredByTitle = null,
        public ?CarbonImmutable $registrationDateTime = null,
        public ?string $registrationStatisticalStatus = null,
        public ?string $registrationStatus = null,
        public ?CarbonImmutable $startDateTime = null,
    ) {
    }
}
