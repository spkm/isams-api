<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeGender;

readonly class EmployeeForUpdate extends Data
{
    /**
     * @param  list<string>|null  $nationalities
     * @param  list<string>|null  $previousFamilyNames
     */
    public function __construct(
        public ?CarbonImmutable $dateOfBirth = null,
        public ?CarbonImmutable $enrolmentDate = null,
        public ?string $forename = null,
        public ?string $fullName = null,
        public ?string $gender = null,
        public ?string $initials = null,
        public ?bool $isPartTime = null,
        public ?bool $isPersonalTutor = null,
        public ?bool $isTeachingStaff = null,
        public ?string $labelSalutation = null,
        public ?CarbonImmutable $leavingDate = null,
        public ?string $letterSalutation = null,
        public ?string $middleNames = null,
        public ?array $nationalities = null,
        public ?string $personalAddress1 = null,
        public ?string $personalAddress2 = null,
        public ?string $personalAddress3 = null,
        public ?string $personalCountry = null,
        public ?string $personalCounty = null,
        public ?string $personalEmailAddress = null,
        public ?string $personalMobileNumber = null,
        public ?string $personalPostcode = null,
        public ?string $personalTelephoneNumber = null,
        public ?string $personalTown = null,
        public ?string $preferredName = null,
        public ?array $previousFamilyNames = null,
        public ?string $schoolEmailAddress = null,
        public ?string $schoolInitials = null,
        public ?string $schoolMobileNumber = null,
        public ?string $schoolSalutation = null,
        public ?string $schoolTelephoneNumber = null,
        public ?string $surname = null,
        public ?string $title = null,
    ) {
    }

    public function genderEnum(): ?EmployeeGender
    {
        return EmployeeGender::tryFrom((string) $this->gender);
    }
}
