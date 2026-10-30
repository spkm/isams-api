<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class ContactType extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public ?string $name = null,
        public ?string $parentalResponsibilityDefault = null,
    ) {
    }
}
