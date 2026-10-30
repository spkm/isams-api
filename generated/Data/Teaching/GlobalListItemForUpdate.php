<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Teaching;

use spkm\IsamsApi\Data\Data;

readonly class GlobalListItemForUpdate extends Data
{
    public function __construct(
        public ?string $description = null,
        public ?string $name = null,
    ) {
    }
}
