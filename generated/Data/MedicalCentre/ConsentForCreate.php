<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ConsentForCreate extends Data
{
    public function __construct(
        public bool $consentGiven,
        public int $typeId,
        public ?string $consentAnswerReason = null,
        public ?CarbonImmutable $receivedDate = null,
        public ?CarbonImmutable $reviewDate = null,
        public ?int $sensitivity = null,
        public ?bool $showToParents = null,
    ) {
    }
}
