<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class LifeEventForCreate extends Data
{
    public function __construct(
        public CarbonImmutable $date,
        public string $description,
        public int $lifeEventTypeId,
        public string $title,
        public ?CarbonImmutable $reminderFrom = null,
        public ?bool $reminderRecur = null,
        public ?CarbonImmutable $reminderTo = null,
    ) {
    }
}
