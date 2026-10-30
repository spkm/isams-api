<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\OtherSchools;

use spkm\IsamsApi\Data\Data;

readonly class IContact extends Data
{
    public function __construct(
        public ?string $forename = null,
        public ?string $honours = null,
        public ?string $initials = null,
        public ?string $profession = null,
        public ?string $surname = null,
        public ?string $title = null,
    ) {
    }
}
