<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use spkm\IsamsApi\Data\Data;

readonly class MetadataFieldGroupSection extends Data
{
    public function __construct(
        public ?string $key = null,
        public ?string $name = null,
    ) {
    }
}
