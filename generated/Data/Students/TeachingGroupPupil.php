<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class TeachingGroupPupil extends Data
{
    public function __construct(
        public ?string $academicHouse = null,
        public ?string $boardingHouse = null,
        public ?string $forename = null,
        public ?string $gender = null,
        public ?string $houseCode = null,
        public ?string $houseName = null,
        public ?int $ncYear = null,
        public ?string $preName = null,
        public ?string $preSurname = null,
        public ?string $surname = null,
        public ?int $systemStatus = null,
        public ?string $yearCode = null,
    ) {
    }
}
