<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class LifeEvent extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $date = null,
        public ?string $description = null,
        public ?string $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?int $lifeEventTypeId = null,
        public ?CarbonImmutable $reminderFrom = null,
        public ?bool $reminderRecur = null,
        public ?CarbonImmutable $reminderTo = null,
        public ?string $schoolId = null,
        public ?string $title = null,
    ) {
    }
}
