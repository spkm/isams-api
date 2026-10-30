<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use spkm\IsamsApi\Data\Data;

readonly class StudentRegisterAssociation extends Data
{
    public function __construct(
        public ?bool $onRegister = null,
        public ?string $schoolId = null,
    ) {
    }
}
