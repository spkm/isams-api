<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Estates;

use spkm\IsamsApi\Data\Data;

readonly class BuildingForUpdate extends Data
{
    public function __construct(
        public ?string $description = null,
        public ?bool $hasClassrooms = null,
        public ?string $initials = null,
        public ?string $name = null,
    ) {
    }
}
