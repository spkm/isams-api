<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class CustomStudentGroupStudent extends Data
{
    public function __construct(
        public ?int $customGroupId = null,
        public ?bool $hidden = null,
        public ?string $schoolId = null,
        public ?string $studentSystemStatus = null,
    ) {
    }
}
