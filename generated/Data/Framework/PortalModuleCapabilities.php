<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Framework;

use spkm\IsamsApi\Data\Data;

readonly class PortalModuleCapabilities extends Data
{
    public function __construct(
        public ?PortalModuleCapabilityFlags $students = null,
    ) {
    }
}
