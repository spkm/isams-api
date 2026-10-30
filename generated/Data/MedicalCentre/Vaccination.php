<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Vaccination extends Data
{
    public function __construct(
        public ?bool $calculatedDateGiven = null,
        public ?CarbonImmutable $dateGiven = null,
        public ?CarbonImmutable $dueDate = null,
        public ?string $key = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $notes = null,
        public ?int $number = null,
        public ?int $sensitivity = null,
        public ?int $vaccinationTypeId = null,
    ) {
    }
}
