<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\School;

use spkm\IsamsApi\Data\Data;

readonly class SchoolDetails extends Data
{
    public function __construct(
        public ?string $clientId = null,
        public ?string $schoolName = null,
    ) {
    }
}
