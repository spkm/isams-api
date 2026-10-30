<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class TagForCreate extends Data
{
    public function __construct(
        public ?int $categoryEntityId = null,
        public ?int $categoryId = null,
        public ?int $entityId = null,
    ) {
    }
}
