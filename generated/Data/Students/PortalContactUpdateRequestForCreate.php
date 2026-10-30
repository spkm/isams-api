<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class PortalContactUpdateRequestForCreate extends Data
{
    public function __construct(
        public string $message,
    ) {
    }
}
