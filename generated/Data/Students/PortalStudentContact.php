<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class PortalStudentContact extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $addressType = null,
        public ?string $country = null,
        public ?string $county = null,
        public ?bool $deceased = null,
        public ?string $email = null,
        public ?string $fax = null,
        public ?string $forename = null,
        public ?string $initials = null,
        public ?string $labelSalutation = null,
        public ?string $letterSalutation = null,
        public ?string $middleNames = null,
        public ?string $mobilePhone = null,
        public ?string $modifiedBy = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?int $personId = null,
        public ?string $postCode = null,
        public ?string $profession = null,
        public ?string $relationship = null,
        public ?bool $secondaryDeceased = null,
        public ?string $secondaryEmail = null,
        public ?string $secondaryForename = null,
        public ?string $secondaryInitials = null,
        public ?string $secondaryMiddleNames = null,
        public ?string $secondaryMobilePhone = null,
        public ?int $secondaryPersonId = null,
        public ?string $secondaryProfession = null,
        public ?string $secondarySurname = null,
        public ?string $secondaryTitle = null,
        public ?string $secondaryUniquePersonId = null,
        public ?string $surname = null,
        public ?string $telephoneNumber = null,
        public ?string $title = null,
        public ?string $town = null,
        public ?string $uniquePersonId = null,
        public ?string $workFax = null,
        public ?string $workTelephoneNumber = null,
    ) {
    }
}
