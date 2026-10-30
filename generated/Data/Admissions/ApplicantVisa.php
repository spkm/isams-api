<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ApplicantVisa extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $cas = null,
        public ?CarbonImmutable $dateOfFirstArrivalToHostCountry = null,
        public ?CarbonImmutable $entryDate = null,
        public ?CarbonImmutable $expiryDate = null,
        public ?bool $hasLinkedDocument = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $name = null,
        public ?string $nationality = null,
        public ?string $note = null,
        public ?string $placeOfIssue = null,
        public ?string $schoolId = null,
        public ?string $type = null,
        public ?CarbonImmutable $validFromDate = null,
        public ?string $visaId = null,
        public ?int $visaPreference = null,
    ) {
    }
}
