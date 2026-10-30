<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use spkm\IsamsApi\Data\Data;

readonly class DoctorForCreate extends Data
{
    public function __construct(
        public ?string $forename = null,
        public ?string $surname = null,
    ) {
    }
}
