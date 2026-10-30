<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ConcernActionForCreate extends Data
{
    public function __construct(
        public int $actionTypeId,
        public ?int $actionOutcomeId = null,
        public ?string $description = null,
        public ?CarbonImmutable $dueDate = null,
        public ?string $outcome = null,
        public ?string $usercode = null,
    ) {
    }
}
