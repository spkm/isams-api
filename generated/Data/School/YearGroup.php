<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\School;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class YearGroup extends Data
{
    public function __construct(
        public ?int $assistantTutorId = null,
        public ?int $averageStartingAge = null,
        public ?string $censusYearGroup = null,
        public ?string $code = null,
        public ?string $emailAddress = null,
        public ?string $iscEnglandWalesYearGroup = null,
        public ?string $iscIrelandYearGroup = null,
        public ?string $iscScotlandYearGroup = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
        public ?int $ncYear = null,
        public ?string $reference = null,
        public ?int $tutorId = null,
        public ?string $websiteAddress = null,
    ) {
    }
}
