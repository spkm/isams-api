<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class PastoralFlagType extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $deleted = null,
        public ?string $icon = null,
        public ?string $name = null,
    ) {
    }
}
