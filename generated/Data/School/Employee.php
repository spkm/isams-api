<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\School;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\School\Enums\EmployeeGender;

readonly class Employee extends Data
{
    /**
     * @param  list<string>  $nationalities
     * @param  list<string>  $previousFamilyNames
     */
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $dateOfBirth = null,
        public ?CarbonImmutable $enrolmentDate = null,
        public ?string $forename = null,
        public ?string $gender = null,
        public ?CarbonImmutable $leavingDate = null,
        public ?string $middleNames = null,
        public array $nationalities = [],
        public ?string $personalEmailAddress = null,
        public ?string $preferredName = null,
        public array $previousFamilyNames = [],
        public ?string $schoolEmailAddress = null,
        public ?string $schoolMobileNumber = null,
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
