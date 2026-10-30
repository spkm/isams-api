<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\Enums\StudentForUpdateGender;

readonly class StudentForUpdate extends Data
{
    /**
     * @param  list<string>|null  $languages
     * @param  list<string>|null  $nationalities
     */
    public function __construct(
        public ?string $academicHouse = null,
        public ?string $birthCounty = null,
        public ?string $birthplace = null,
        public ?string $boardingHouse = null,
        public ?string $boardingStatus = null,
        public ?CarbonImmutable $dob = null,
        public ?CarbonImmutable $enrolmentDate = null,
        public ?string $enrolmentTerm = null,
        public ?int $enrolmentYear = null,
        public ?string $ethnicity = null,
        public ?string $forename = null,
        public ?string $formGroup = null,
        public ?string $fullName = null,
        public ?int $futureSchoolId = null,
        public ?string $gender = null,
        public ?string $initials = null,
        public ?bool $isVisaRequired = null,
        public ?string $labelSalutation = null,
        public ?array $languages = null,
        public ?CarbonImmutable $leavingDate = null,
        public ?string $leavingReason = null,
        public ?int $leavingYearGroup = null,
        public ?string $letterSalutation = null,
        public ?string $middlenames = null,
        public ?string $middleNames = null,
        public ?string $mobileNumber = null,
        public ?array $nationalities = null,
        public ?string $officialName = null,
        public ?string $personalEmailAddress = null,
        public ?string $preferredName = null,
        public ?string $previousName = null,
        public ?string $religion = null,
        public ?string $residentCountry = null,
        public ?string $schoolCode = null,
        public ?string $schoolEmailAddress = null,
        public ?string $surname = null,
        public ?string $title = null,
        public ?int $tutorEmployeeId = null,
        public ?string $uniquePupilNumber = null,
        public ?int $yearGroup = null,
    ) {
    }

    public function genderEnum(): ?StudentForUpdateGender
    {
        return StudentForUpdateGender::tryFrom((string) $this->gender);
    }
}
