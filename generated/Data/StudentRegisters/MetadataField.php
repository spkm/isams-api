<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\StudentRegisters\Enums\MetadataFieldType;

readonly class MetadataField extends Data
{
    /**
     * @param  array<string, mixed>|null  $properties
     */
    public function __construct(
        public ?MetadataFieldGroup $group = null,
        public ?string $key = null,
        public ?string $name = null,
        public ?array $properties = null,
        public ?string $type = null,
    ) {
    }

    public function typeEnum(): ?MetadataFieldType
    {
        return MetadataFieldType::tryFrom((string) $this->type);
    }
}
