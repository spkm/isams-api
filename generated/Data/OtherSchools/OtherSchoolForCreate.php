<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\OtherSchools;

use spkm\IsamsApi\Data\Data;

readonly class OtherSchoolForCreate extends Data
{
    public function __construct(
        public string $postcode,
        public string $schoolCode,
        public string $schoolName,
        public string $schoolTelephone,
        public ?string $addressLine1 = null,
        public ?string $addressLine2 = null,
        public ?string $addressLine3 = null,
        public ?string $country = null,
        public ?string $county = null,
        public ?IContact $primaryContact = null,
        public ?string $schoolEmail = null,
        public ?string $schoolWebsite = null,
        public ?string $town = null,
    ) {
    }
}
