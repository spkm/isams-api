<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class AttendanceCodeReasonForChange extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $changedBy = null,
        public ?CarbonImmutable $changedOn = null,
        public ?AttendanceCode $codeChangedFrom = null,
        public ?AttendanceCode $codeChangedTo = null,
        public ?string $reason = null,
        public ?int $registerId = null,
        public ?string $schoolId = null,
    ) {
    }
}
