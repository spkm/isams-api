<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ConcernAction extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $actionOutcomeId = null,
        public ?int $actionStatusId = null,
        public ?int $actionTypeId = null,
        public ?int $concernId = null,
        public ?string $description = null,
        public ?CarbonImmutable $dueDate = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $outcome = null,
        public ?string $usercode = null,
    ) {
    }
}
