<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use spkm\IsamsApi\Data\Data;

readonly class StudentTimetableYearSchedule extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $employeeId = null,
        public ?string $employeeSurname = null,
        public ?string $employeeTitle = null,
        public ?string $name = null,
        public ?int $periodId = null,
        public ?string $roomCode = null,
        public ?int $roomId = null,
    ) {
    }
}
