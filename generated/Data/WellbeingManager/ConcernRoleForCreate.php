<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class ConcernRoleForCreate extends Data
{
    public function __construct(
        public string $name,
        public ?bool $createLinkedConcern = null,
        public ?bool $isDefault = null,
    ) {
    }
}
