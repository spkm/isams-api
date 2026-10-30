<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class GlobalListRuleForCreate extends Data
{
    public function __construct(
        public ?string $listType = null,
    ) {
    }
}
