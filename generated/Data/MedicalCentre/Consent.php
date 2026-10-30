<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Consent extends Data
{
    public function __construct(
        public ?string $consentAnswerReason = null,
        public ?bool $consentGiven = null,
        public ?string $key = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?CarbonImmutable $receivedDate = null,
        public ?CarbonImmutable $reviewDate = null,
        public ?int $sensitivity = null,
        public ?bool $showToParents = null,
        public ?int $typeId = null,
    ) {
    }
}
