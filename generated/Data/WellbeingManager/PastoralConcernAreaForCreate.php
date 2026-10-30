<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class PastoralConcernAreaForCreate extends Data
{
    public function __construct(
        public bool $girfec,
        public string $name,
    ) {
    }
}
