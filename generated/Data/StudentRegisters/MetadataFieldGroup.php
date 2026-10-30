<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use spkm\IsamsApi\Data\Data;

readonly class MetadataFieldGroup extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $key = null,
        public ?string $name = null,
        public ?MetadataFieldGroupSection $section = null,
        public ?string $type = null,
    ) {
    }
}
