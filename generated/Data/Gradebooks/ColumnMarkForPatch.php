<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class ColumnMarkForPatch extends Data
{
    public function __construct(
        public int $columnId,
        public ?bool $isAbsent = null,
        public ?bool $isExempt = null,
        public ?bool $isSubmitted = null,
        public ?string $value = null,
    ) {
    }
}
