<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class Teacher extends Data
{
    public function __construct(
        public ?string $firstname = null,
        public ?string $salutation = null,
        public ?string $schoolEmailAddress = null,
        public ?string $surname = null,
        public ?string $title = null,
        public ?string $userCode = null,
    ) {
    }
}
