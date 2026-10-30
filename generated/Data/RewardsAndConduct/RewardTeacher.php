<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\RewardsAndConduct;

use spkm\IsamsApi\Data\Data;

readonly class RewardTeacher extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $email = null,
        public ?string $name = null,
        public ?string $userCode = null,
    ) {
    }
}
