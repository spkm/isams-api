<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Bmi extends Data
{
    public function __construct(
        public ?bool $archived = null,
        public ?float $bmi = null,
        public ?CarbonImmutable $dateTaken = null,
        public ?float $height = null,
        public ?string $key = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?CarbonImmutable $lmp = null,
        public ?string $notes = null,
        public ?int $sensitivity = null,
        public ?float $weight = null,
    ) {
    }
}
