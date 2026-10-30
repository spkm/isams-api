<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use spkm\IsamsApi\Data\Data;

readonly class ListItem extends Data
{
    public function __construct(
        public ?string $text = null,
        public ?string $value = null,
    ) {
    }
}
