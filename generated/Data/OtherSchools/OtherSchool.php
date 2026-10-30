<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\OtherSchools;

use spkm\IsamsApi\Data\Data;

readonly class OtherSchool extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $addressLine1 = null,
        public ?string $addressLine2 = null,
        public ?string $addressLine3 = null,
        public ?string $country = null,
        public ?string $county = null,
        public ?string $postcode = null,
        public ?IContact $primaryContact = null,
        public ?string $schoolCode = null,
        public ?string $schoolEmail = null,
        public ?string $schoolName = null,
        public ?string $schoolTelephone = null,
        public ?string $schoolWebsite = null,
        public ?string $town = null,
    ) {
    }
}
