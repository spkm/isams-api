<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use spkm\IsamsApi\Data\Data;

readonly class SurgeryForCreate extends Data
{
    public function __construct(
        public ?string $addressLine1 = null,
        public ?string $addressLine2 = null,
        public ?string $addressLine3 = null,
        public ?string $country = null,
        public ?string $county = null,
        public ?string $email = null,
        public ?string $fax = null,
        public ?string $name = null,
        public ?string $postCode = null,
        public ?string $telephone = null,
        public ?string $town = null,
        public ?string $website = null,
    ) {
    }
}
