<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Curriculum;

use spkm\IsamsApi\Data\Data;

readonly class Cycle extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?bool $archived = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?string $endyear = null,
        public ?string $graduationYear = null,
        public ?string $name = null,
        public ?string $startYear = null,
    ) {
    }
}
