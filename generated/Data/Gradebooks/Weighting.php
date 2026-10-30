<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class Weighting extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $isInUse = null,
        public ?string $name = null,
        public ?float $value = null,
    ) {
    }
}
