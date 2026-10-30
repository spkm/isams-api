<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\HouseType;

readonly class House extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?string $type = null,
    ) {
    }

    public function typeEnum(): ?HouseType
    {
        return HouseType::tryFrom((string) $this->type);
    }
}
