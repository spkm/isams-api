<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use spkm\IsamsApi\Data\Data;

readonly class StudentScreeningLog extends Data
{
    public function __construct(
        public ?string $added = null,
        public ?string $addedBy = null,
        public ?string $removed = null,
        public ?string $removedBy = null,
    ) {
    }
}
