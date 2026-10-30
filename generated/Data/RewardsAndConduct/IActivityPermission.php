<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\RewardsAndConduct;

use spkm\IsamsApi\Data\Data;

readonly class IActivityPermission extends Data
{
    public function __construct(
        public ?bool $hasCreateAccess = null,
        public ?bool $hasDeleteAccess = null,
        public ?bool $hasReadAccess = null,
        public ?bool $hasUpdateAccess = null,
    ) {
    }
}
