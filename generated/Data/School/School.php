<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\School;

use spkm\IsamsApi\Data\Data;

readonly class School extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $address1 = null,
        public ?string $name = null,
        public ?string $postcode = null,
    ) {
    }
}
