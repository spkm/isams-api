<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use spkm\IsamsApi\Data\Data;

readonly class EmployeeTimetableSet extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?int $periodId = null,
        public ?string $roomCode = null,
        public ?int $roomId = null,
        public ?int $scheduleId = null,
        public ?string $subjectCode = null,
        public ?int $subjectId = null,
        public ?int $year = null,
        public ?string $yearCode = null,
        public ?string $yearName = null,
    ) {
    }
}
