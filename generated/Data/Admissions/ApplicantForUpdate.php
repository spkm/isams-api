<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Admissions\Enums\Gender;
use spkm\IsamsApi\Data\Data;

readonly class ApplicantForUpdate extends Data
{
    /**
     * @param  list<string>|null  $languages
     * @param  list<string>|null  $nationalities
     */
    public function __construct(
        public string $forename,
        public string $gender,
        public ?string $admissionStatus = null,
        public ?string $birthCounty = null,
        public ?string $birthplace = null,
        public ?string $boardingStatus = null,
        public ?int $currentSchoolId = null,
        public ?CarbonImmutable $dateOfBirth = null,
        public ?CarbonImmutable $enquiryDate = null,
        public ?string $enquiryReason = null,
        public ?string $enquiryType = null,
        public ?int $enrolmentAcademicHouseId = null,
        public ?int $enrolmentBoardingHouseId = null,
        public ?CarbonImmutable $enrolmentDate = null,
        public ?string $enrolmentOfferType = null,
        public ?string $enrolmentSchoolForm = null,
        public ?string $enrolmentSchoolTerm = null,
        public ?int $enrolmentSchoolYear = null,
        public ?int $enrolmentSchoolYearGroup = null,
        public ?string $ethnicity = null,
        public ?string $fullName = null,
        public ?string $initials = null,
        public ?bool $isVisaRequired = null,
        public ?string $labelSalutation = null,
        public ?array $languages = null,
        public ?string $letterSalutation = null,
        public ?string $middleNames = null,
        public ?string $mobileNumber = null,
        public ?array $nationalities = null,
        public ?string $officialName = null,
        public ?string $preferredName = null,
        public ?CarbonImmutable $registeredDate = null,
        public ?string $religion = null,
        public ?string $residentCountry = null,
        public ?string $schoolCode = null,
        public ?string $schoolEmailAddress = null,
        public ?string $surname = null,
        public ?string $title = null,
        public ?string $uniquePupilNumber = null,
    ) {
    }

    public function genderEnum(): ?Gender
    {
        return Gender::tryFrom((string) $this->gender);
    }
}
