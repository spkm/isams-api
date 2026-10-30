<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\Enums\StaffType;

readonly class Staff extends Data
{
    public function __construct(
        public ?string $type = null,
        public ?string $userCode = null,
    ) {
    }

    public function typeEnum(): ?StaffType
    {
        return StaffType::tryFrom((string) $this->type);
    }
}
