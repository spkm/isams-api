<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class StylingDesign extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $background = null,
        public ?bool $bold = null,
        public ?string $colour = null,
        public ?bool $isInUse = null,
        public ?bool $italic = null,
        public ?string $name = null,
    ) {
    }
}
