<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use spkm\IsamsApi\Data\Data;

readonly class PresentCode extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?int $displayOrder = null,
        public ?bool $isOOCActive = null,
        public ?string $name = null,
        public ?bool $showOnRegister = null,
    ) {
    }
}
