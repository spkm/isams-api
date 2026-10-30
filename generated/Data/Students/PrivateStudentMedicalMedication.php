<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class PrivateStudentMedicalMedication extends Data
{
    public function __construct(
        public ?string $dose = null,
        public ?CarbonImmutable $expiryDate = null,
        public ?string $key = null,
        public ?string $name = null,
        public ?string $notes = null,
    ) {
    }
}
