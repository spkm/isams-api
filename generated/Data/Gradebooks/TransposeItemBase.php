<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class TransposeItemBase extends Data
{
    public function __construct(
        public ?string $operator = null,
        public ?string $sourceValue = null,
        public ?string $targetValue = null,
    ) {
    }
}
