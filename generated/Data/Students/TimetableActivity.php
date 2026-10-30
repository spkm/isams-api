<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class TimetableActivity extends Data
{
    public function __construct(
        public ?string $code = null,
        public ?CarbonImmutable $endDate = null,
        public ?int $eventSize = null,
        public ?string $groupCode = null,
        public ?string $groupName = null,
        public ?int $groupSize = null,
        public ?string $image = null,
        public ?string $location = null,
        public ?string $name = null,
        public ?CarbonImmutable $startDate = null,
        public ?string $subject = null,
        public ?string $teacherID = null,
        public ?string $teacherInitials = null,
        public ?string $teacherSalutation = null,
    ) {
    }
}
