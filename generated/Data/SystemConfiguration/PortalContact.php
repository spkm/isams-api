<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class PortalContact extends Data
{
    public function __construct(
        public ?string $emailAddress = null,
        public ?string $forename = null,
        public ?string $fullName = null,
        public ?int $portalId = null,
        public ?string $salutation = null,
        public ?int $staffId = null,
        public ?string $surname = null,
        public ?string $telephoneNumber = null,
        public ?string $title = null,
    ) {
    }
}
