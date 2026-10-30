<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class PrivateStudentMedicalCondition extends Data
{
    public function __construct(
        public ?int $groupId = null,
        public ?string $key = null,
        public ?int $severityId = null,
        public ?string $treatment = null,
        public ?string $trigger = null,
        public ?string $type = null,
    ) {
    }
}
