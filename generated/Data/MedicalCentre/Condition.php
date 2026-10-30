<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Condition extends Data
{
    public function __construct(
        public ?bool $archived = null,
        public ?CarbonImmutable $dateEntered = null,
        public ?CarbonImmutable $dateReviewed = null,
        public ?string $furtherInfo = null,
        public ?int $groupId = null,
        public ?string $key = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?int $sensitivity = null,
        public ?int $severityId = null,
        public ?string $treatment = null,
        public ?string $trigger = null,
        public ?string $type = null,
    ) {
    }
}
