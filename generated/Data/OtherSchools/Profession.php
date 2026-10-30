<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\OtherSchools;

use spkm\IsamsApi\Data\Data;

readonly class Profession extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?bool $isActive = null,
        public ?string $name = null,
    ) {
    }
}
