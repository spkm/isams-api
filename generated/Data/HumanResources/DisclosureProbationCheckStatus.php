<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use spkm\IsamsApi\Data\Data;

readonly class DisclosureProbationCheckStatus extends Data
{
    public function __construct(
        public ?string $code = null,
        public ?string $description = null,
    ) {
    }
}
