<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class Allocation extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $value = null,
    ) {
    }
}
