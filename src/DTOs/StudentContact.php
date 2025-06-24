<?php

namespace spkm\IsamsApi\DTOs;

class StudentContact
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $additionalId,
        public readonly ?string $address1,
        public readonly ?string $address2,
        public readonly ?string $address3,
        public readonly int $addressId,
        public readonly bool $billing,
        public readonly bool $canShareWithOtherParents,
        public readonly bool $contactOnly,
        public readonly ?string $contactType,
        public readonly ?string $country,
        public readonly ?string $county,
        public readonly bool $deceased,
        public readonly ?string $emailAddress,
        public readonly ?string $emergencyNotes,
        public readonly ?string $fax,
        public readonly ?string $forename,
        public readonly bool $includeInAllMailMerges,
        public readonly bool $includeInMailMergeForBilling,
        public readonly bool $includeInMailMergeForCorrespondence,
        public readonly bool $includeInMailMergeForReports,
        public readonly ?string $lastUpdated,
        public readonly ?string $lastUpdatedBy,
        public readonly ?string $middleNames,
        public readonly ?string $mobileNumber,
        public readonly ?string $nationalId,
        public readonly string $parentalResponsibility,
        public readonly ?string $passportNumber,
        public readonly string $personGuid,
        public readonly int $personId,
        public readonly ?string $postcode,
        public readonly ?string $preferredPaymentMethod,
        public readonly bool $private,
        public readonly ?string $profession,
        public readonly ?string $relationship,
        public readonly ?string $relationshipOfJointContact,
        public readonly ?string $secondaryPersonGuid,
        public readonly ?int $secondaryPersonId,
        public readonly ?string $surname,
        public readonly ?string $taxRegistrationNumber,
        public readonly ?string $telephoneNumber,
        public readonly ?string $title,
        public readonly ?string $town,
        public readonly ?string $workTelephoneNumber
    ) {
    }
}
