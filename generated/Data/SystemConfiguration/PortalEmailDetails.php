<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class PortalEmailDetails extends Data
{
    public function __construct(
        public ?string $emailAddress = null,
        public ?bool $emailRequiresVerification = null,
        public ?string $forename = null,
        public ?string $surname = null,
    ) {
    }
}
