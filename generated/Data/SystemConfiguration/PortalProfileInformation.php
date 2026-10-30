<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class PortalProfileInformation extends Data
{
    public function __construct(
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $county = null,
        public ?string $email = null,
        public ?string $forename = null,
        public ?bool $hasElevatedAccess = null,
        public ?bool $hasUniquePersonId = null,
        public ?bool $isBillPayer = null,
        public ?string $mobilePhone = null,
        public ?string $postCode = null,
        public ?string $surname = null,
        public ?string $telephoneNumber = null,
        public ?string $title = null,
        public ?string $town = null,
        public ?string $uniquePersonId = null,
    ) {
    }
}
