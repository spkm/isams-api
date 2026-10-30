<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use spkm\IsamsApi\Data\Data;

readonly class TimetableImportResultItem extends Data
{
    public function __construct(
        public ?string $description = null,
    ) {
    }
}
