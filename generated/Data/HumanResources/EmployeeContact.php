<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use spkm\IsamsApi\Data\Data;

readonly class EmployeeContact extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $addressType = null,
        public ?bool $contactOnly = null,
        public ?string $country = null,
        public ?string $county = null,
        public ?string $emailAddress = null,
        public ?string $emergencyNotes = null,
        public ?string $forename = null,
        public ?string $middleNames = null,
        public ?string $mobileNumber = null,
        public ?string $postcode = null,
        public ?string $relationship = null,
        public ?string $surname = null,
        public ?string $telephoneNumber = null,
        public ?string $title = null,
        public ?string $town = null,
        public ?string $workTelephoneNumber = null,
    ) {
    }
}
