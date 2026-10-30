<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Framework;

use spkm\IsamsApi\Data\Data;

readonly class PortalModuleCapabilityFlags extends Data
{
    public function __construct(
        public ?bool $edit = null,
        public ?bool $view = null,
    ) {
    }
}
