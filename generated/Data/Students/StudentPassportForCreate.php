<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class StudentPassportForCreate extends Data
{
    public function __construct(
        public ?CarbonImmutable $dateOfIssue = null,
        public ?CarbonImmutable $expiryDate = null,
        public ?string $name = null,
        public ?string $note = null,
        public ?string $number = null,
        public ?string $passportNationality = null,
        public ?int $passportPreference = null,
        public ?string $placeOfBirth = null,
        public ?string $placeOfIssue = null,
        public ?string $type = null,
    ) {
    }
}
