<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\Enums\AlumniStudentGender;
use spkm\IsamsApi\Data\Students\Enums\AlumniStudentSystemStatus;

readonly class AlumniStudent extends Data
{
    /**
     * @param  list<string>  $languages
     * @param  list<string>  $nationalities
     */
    public function __construct(
        public ?string $admissionStatus = null,
        public ?string $boardingStatus = null,
        public ?CarbonImmutable $enquiryDate = null,
        public ?CarbonImmutable $enrolmentDate = null,
        public ?int $enrolmentYear = null,
        public ?int $enrolmentYearGroup = null,
        public ?string $forename = null,
        public ?string $fullName = null,
        public ?int $futureSchoolId = null,
        public ?string $futureSchoolType = null,
        public ?string $gender = null,
        public ?string $initials = null,
        public ?bool $isVisaRequired = null,
        public array $languages = [],
        public ?CarbonImmutable $lastUpdated = null,
        public ?CarbonImmutable $leavingDate = null,
        public ?string $leavingReason = null,
        public ?string $leavingTerm = null,
        public ?int $leavingYear = null,
        public ?int $leavingYearGroup = null,
        public ?string $middlenames = null,
        public array $nationalities = [],
        public ?string $officialName = null,
        public ?string $personGuid = null,
        public ?int $personId = null,
        public ?string $preferredName = null,
        public ?string $preferredSurname = null,
        public ?CarbonImmutable $registeredDate = null,
        public ?string $schoolCode = null,
        public ?string $schoolId = null,
        public ?string $surname = null,
        public ?string $systemStatus = null,
        public ?string $title = null,
        public ?CarbonImmutable $visitDate = null,
        public ?int $yearGroup = null,
    ) {
    }

    public function genderEnum(): ?AlumniStudentGender
    {
        return AlumniStudentGender::tryFrom((string) $this->gender);
    }

    public function systemStatusEnum(): ?AlumniStudentSystemStatus
    {
        return AlumniStudentSystemStatus::tryFrom((string) $this->systemStatus);
    }
}
