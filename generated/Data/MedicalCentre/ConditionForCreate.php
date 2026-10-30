<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ConditionForCreate extends Data
{
    public function __construct(
        public CarbonImmutable $dateEntered,
        public int $groupId,
        public string $type,
        public ?CarbonImmutable $dateReviewed = null,
        public ?string $furtherInfo = null,
        public ?int $sensitivity = null,
        public ?int $severityId = null,
        public ?string $treatment = null,
        public ?string $trigger = null,
    ) {
    }
}
