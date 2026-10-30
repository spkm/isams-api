<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\Enums\MembershipType;

readonly class GradebookStudent extends Data
{
    public function __construct(
        public ?bool $deleted = null,
        public ?bool $disassociated = null,
        public ?string $schoolId = null,
        public ?string $type = null,
    ) {
    }

    public function typeEnum(): ?MembershipType
    {
        return MembershipType::tryFrom((string) $this->type);
    }
}
