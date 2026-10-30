<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class GlobalListItem extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $common = null,
        public ?string $description = null,
        public ?string $listType = null,
        public ?string $name = null,
    ) {
    }
}
