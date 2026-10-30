<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use spkm\IsamsApi\Data\Data;

readonly class FormTimetableForm extends Data
{
    public function __construct(
        public ?string $code = null,
        public ?int $employeeId = null,
        public ?string $employeeSurname = null,
        public ?string $employeeTitle = null,
        public ?int $periodId = null,
        public ?string $roomCode = null,
        public ?int $roomId = null,
        public ?int $scheduleId = null,
        public ?string $subjectCode = null,
        public ?int $subjectId = null,
        public ?string $timetableCode = null,
    ) {
    }
}
