<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class AllocationCriteriaBase extends Data
{
    public function __construct(
        public ?string $allocationCriteria = null,
        public ?string $allocationType = null,
        public ?string $allocationValue = null,
    ) {
    }
}
