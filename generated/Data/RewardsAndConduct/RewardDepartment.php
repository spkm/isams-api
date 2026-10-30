<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\RewardsAndConduct;

use spkm\IsamsApi\Data\Data;

readonly class RewardDepartment extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $name = null,
    ) {
    }
}
