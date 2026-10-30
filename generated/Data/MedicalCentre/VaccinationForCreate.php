<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class VaccinationForCreate extends Data
{
    public function __construct(
        public CarbonImmutable $dateGiven,
        public int $number,
        public int $sensitivity,
        public int $vaccinationTypeId,
        public ?CarbonImmutable $dueDate = null,
        public ?string $notes = null,
    ) {
    }
}
