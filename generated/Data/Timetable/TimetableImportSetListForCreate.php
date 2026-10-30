<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use spkm\IsamsApi\Data\Data;

readonly class TimetableImportSetListForCreate extends Data
{
    public function __construct(
        public string $schoolId,
        public string $setCode,
    ) {
    }
}
