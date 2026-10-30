<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use spkm\IsamsApi\Data\Data;

readonly class ElectronicFormItemResponse extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?string $type = null,
        public ?string $value = null,
    ) {
    }
}
