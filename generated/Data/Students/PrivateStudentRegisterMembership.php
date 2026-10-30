<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class PrivateStudentRegisterMembership extends Data
{
    public function __construct(
        public ?PrivateStudentSen $flag = null,
        public ?string $name = null,
        public ?bool $onRegister = null,
        public ?string $reportingKey = null,
    ) {
    }
}
