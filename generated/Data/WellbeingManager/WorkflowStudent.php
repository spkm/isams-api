<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class WorkflowStudent extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $displayName = null,
        public ?bool $filter = null,
        public ?string $gender = null,
        public ?int $personId = null,
        public ?CarbonImmutable $startDate = null,
        public ?int $workflowId = null,
    ) {
    }
}
