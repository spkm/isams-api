<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use spkm\IsamsApi\Data\Data;

readonly class TimetableImportSubjectForCreate extends Data
{
    public function __construct(
        public string $subjectName,
        public ?string $departmentName = null,
        public ?string $subjectCode = null,
    ) {
    }
}
