<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\RewardsAndConduct;

use spkm\IsamsApi\Data\Data;

readonly class RewardFieldType extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?RewardFieldValue $fieldValue = null,
        public ?string $name = null,
    ) {
    }
}
