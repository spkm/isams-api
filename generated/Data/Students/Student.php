<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\Enums\Gender;
use spkm\IsamsApi\Data\Students\Enums\SystemStatus;

readonly class Student extends Data
{
    protected const LISTS = [
        'homeAddresses' => HomeAddress::class,
        'languageIsoMappings' => IsoMapping::class,
        'nationalityIsoMappings' => IsoMapping::class,
    ];

    /**
     * @param  Collection<int, HomeAddress>  $homeAddresses
     * @param  Collection<int, IsoMapping>  $languageIsoMappings
     * @param  list<string>  $languages
     * @param  list<string>  $nationalities
     * @param  Collection<int, IsoMapping>  $nationalityIsoMappings
     */
    public function __construct(
        public ?int $id = null,
        public ?string $academicHouse = null,
        public ?string $birthCounty = null,
        public ?string $birthplace = null,
        public ?string $boardingHouse = null,
        public ?string $boardingStatus = null,
        public ?CarbonImmutable $dob = null,
        public ?CarbonImmutable $enrolmentDate = null,
        public ?string $enrolmentStatus = null,
        public ?string $enrolmentTerm = null,
        public ?int $enrolmentYear = null,
        public ?string $ethnicity = null,
        public ?int $familyId = null,
        public ?string $forename = null,
        public ?string $formGroup = null,
        public ?string $fullName = null,
        public ?int $futureSchoolId = null,
        public ?string $gender = null,
        public Collection $homeAddresses = new Collection,
        public ?string $initials = null,
        public ?bool $isVisaRequired = null,
        public ?string $labelSalutation = null,
        public Collection $languageIsoMappings = new Collection,
        public array $languages = [],
        public ?CarbonImmutable $lastUpdated = null,
        public ?int $latestPhotoId = null,
        public ?CarbonImmutable $leavingDate = null,
        public ?string $leavingReason = null,
        public ?int $leavingYearGroup = null,
        public ?string $letterSalutation = null,
        public ?string $middlenames = null,
        public ?string $mobileNumber = null,
        public array $nationalities = [],
        public Collection $nationalityIsoMappings = new Collection,
        public ?string $officialName = null,
        public ?string $personalEmailAddress = null,
        public ?string $personGuid = null,
        public ?int $personId = null,
        public ?string $preferredName = null,
        public ?string $preferredSurname = null,
        public ?string $previousName = null,
        public ?string $religion = null,
        public ?RemovalGrounds $removalGrounds = null,
        public ?string $residentCountry = null,
        public ?string $schoolCode = null,
        public ?string $schoolEmailAddress = null,
        public ?string $schoolId = null,
        public ?string $surname = null,
        public ?string $systemStatus = null,
        public ?string $title = null,
        public ?int $tutorEmployeeId = null,
        public ?string $uniquePupilNumber = null,
        public ?int $yearGroup = null,
    ) {
    }

    public function genderEnum(): ?Gender
    {
        return Gender::tryFrom((string) $this->gender);
    }

    public function systemStatusEnum(): ?SystemStatus
    {
        return SystemStatus::tryFrom((string) $this->systemStatus);
    }
}
