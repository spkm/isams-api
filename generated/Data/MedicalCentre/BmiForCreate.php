<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class BmiForCreate extends Data
{
    public function __construct(
        public CarbonImmutable $dateTaken,
        public float $height,
        public float $weight,
        public ?bool $archived = null,
        public ?CarbonImmutable $lmp = null,
        public ?string $notes = null,
        public ?int $sensitivity = null,
    ) {
    }
}
