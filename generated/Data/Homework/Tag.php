<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Homework;

use spkm\IsamsApi\Data\Data;

readonly class Tag extends Data
{
    public function __construct(
        public ?string $categoryType = null,
        public ?string $value = null,
    ) {
    }
}
