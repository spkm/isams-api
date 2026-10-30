<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class SecurityOptions extends Data
{
    public function __construct(
        public ?int $maxPasswordlength = null,
    ) {
    }
}
