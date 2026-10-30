<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use spkm\IsamsApi\Data\Data;

readonly class TimetableLesson extends Data
{
    public function __construct(
        public ?int $periodId = null,
        public ?string $room = null,
        public ?string $setCode = null,
        public ?string $subject = null,
        public ?string $teacher = null,
        public ?string $year = null,
    ) {
    }
}
