<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Discipline;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class DetentionSessionStudent extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorised = null,
        public ?string $authorisedBy = null,
        public ?CarbonImmutable $authorisedDateTime = null,
        public ?int $community = null,
        public ?int $department = null,
        public ?CarbonImmutable $detentionDate = null,
        public ?int $detentionLength = null,
        public ?int $detentionSessionID = null,
        public ?string $offenceCode = null,
        public ?string $offenceDescription = null,
        public ?int $present = null,
        public ?string $schoolID = null,
        public ?int $selected = null,
        public ?CarbonImmutable $submitDateTime = null,
        public ?string $submittedBy = null,
        public ?string $workSet = null,
    ) {
    }
}
