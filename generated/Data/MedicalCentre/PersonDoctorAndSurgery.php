<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class PersonDoctorAndSurgery extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $doctorId = null,
        public ?CarbonImmutable $lastEdited = null,
        public ?string $lastEditedBy = null,
        public ?int $surgeryId = null,
    ) {
    }
}
