<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class PrivateTag extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $categoryId = null,
        public ?string $code = null,
        public ?string $name = null,
    ) {
    }
}
