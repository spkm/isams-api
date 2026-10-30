<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class PastoralFlagForCreate extends Data
{
    public function __construct(
        public int $flagTypeId,
        public ?string $notes = null,
    ) {
    }
}
