<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use spkm\IsamsApi\Data\Data;

readonly class Doctor extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $forename = null,
        public ?int $surgeryId = null,
        public ?string $surgeryName = null,
        public ?string $surname = null,
    ) {
    }
}
