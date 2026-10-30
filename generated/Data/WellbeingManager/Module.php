<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class Module extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
    ) {
    }
}
