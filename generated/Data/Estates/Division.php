<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Estates;

use spkm\IsamsApi\Data\Data;

readonly class Division extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?int $order = null,
    ) {
    }
}
