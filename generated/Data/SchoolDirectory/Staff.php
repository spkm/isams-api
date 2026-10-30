<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SchoolDirectory;

use spkm\IsamsApi\Data\Data;

readonly class Staff extends Data
{
    public function __construct(
        public ?int $division = null,
        public ?string $emailAddress = null,
        public ?string $forename = null,
        public ?string $initials = null,
        public ?string $schoolId = null,
        public ?int $staffID = null,
        public ?string $surname = null,
        public ?string $title = null,
    ) {
    }
}
