<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use spkm\IsamsApi\Data\Data;

readonly class AttendanceCode extends Data
{
    public function __construct(
        public ?int $absenceCodeId = null,
        public ?bool $present = null,
    ) {
    }
}
