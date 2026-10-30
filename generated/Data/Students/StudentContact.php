<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class StudentContact extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $additionalId = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?int $addressId = null,
        public ?bool $billing = null,
        public ?bool $canShareWithOtherParents = null,
        public ?bool $contactOnly = null,
        public ?string $contactType = null,
        public ?string $country = null,
        public ?IsoMapping $countryIsoMapping = null,
        public ?string $county = null,
        public ?bool $deceased = null,
        public ?string $emailAddress = null,
        public ?string $emergencyNotes = null,
        public ?string $fax = null,
        public ?string $forename = null,
        public ?bool $includeInAllMailMerges = null,
        public ?bool $includeInMailMergeForBilling = null,
        public ?bool $includeInMailMergeForCorrespondence = null,
        public ?bool $includeInMailMergeForReports = null,
        public ?bool $isPrimaryContact = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $middleNames = null,
        public ?string $mobileNumber = null,
        public ?string $nationalId = null,
        public ?string $parentalResponsibility = null,
        public ?string $passportNumber = null,
        public ?string $personGuid = null,
        public ?int $personId = null,
        public ?string $postcode = null,
        public ?string $preferredPaymentMethod = null,
        public ?bool $private = null,
        public ?string $profession = null,
        public ?string $relationship = null,
        public ?string $relationshipOfJointContact = null,
        public ?string $secondaryPersonGuid = null,
        public ?int $secondaryPersonId = null,
        public ?string $surname = null,
        public ?string $taxRegistrationNumber = null,
        public ?string $telephoneNumber = null,
        public ?string $title = null,
        public ?string $town = null,
        public ?string $workTelephoneNumber = null,
    ) {
    }
}
