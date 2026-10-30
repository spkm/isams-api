<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ExamTimetable extends Data
{
    public function __construct(
        public ?string $board = null,
        public ?string $boardCode = null,
        public ?string $componentCode = null,
        public ?int $componentId = null,
        public ?string $componentTitle = null,
        public ?string $duration = null,
        public ?CarbonImmutable $examStart = null,
        public ?bool $isSQAExam = null,
        public ?string $location = null,
        public ?int $locationId = null,
        public ?int $locationType = null,
        public ?CarbonImmutable $originalExamStart = null,
        public ?int $roomConfigurationId = null,
        public ?int $scheduleId = null,
        public ?int $scheduleType = null,
        public ?string $seatNumber = null,
        public ?string $subject = null,
        public ?int $timeAllowed = null,
        public ?string $timetabled = null,
        public ?string $timetableSession = null,
    ) {
    }
}
