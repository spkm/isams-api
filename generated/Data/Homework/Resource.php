<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Homework;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Homework\Enums\ResourceType;

readonly class Resource extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public ?string $fileName = null,
        public ?int $homeworkId = null,
        public ?string $path = null,
        public ?string $type = null,
    ) {
    }

    public function typeEnum(): ?ResourceType
    {
        return ResourceType::tryFrom((string) $this->type);
    }
}
