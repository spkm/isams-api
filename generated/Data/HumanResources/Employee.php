<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeGender;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeSystemStatus;

readonly class Employee extends Data
{
    protected const LISTS = [
        'absences' => Absence::class,
        'customFields' => CustomField::class,
        'divisions' => Division::class,
        'externalSystemIds' => ExternalSystemId::class,
        'integrations' => Integration::class,
        'languageIsoMappings' => IsoMapping::class,
        'nationalityIsoMappings' => IsoMapping::class,
    ];

    /**
     * @param  Collection<int, Absence>  $absences
     * @param  Collection<int, CustomField>  $customFields
     * @param  Collection<int, Division>  $divisions
     * @param  Collection<int, ExternalSystemId>  $externalSystemIds
     * @param  Collection<int, Integration>  $integrations
     * @param  Collection<int, IsoMapping>  $languageIsoMappings
     * @param  list<string>  $languages
     * @param  list<string>  $nationalities
     * @param  Collection<int, IsoMapping>  $nationalityIsoMappings
     * @param  list<string>  $previousFamilyNames
     */
    public function __construct(
        public ?int $id = null,
        public Collection $absences = new Collection,
        public ?int $currentContractId = null,
        public Collection $customFields = new Collection,
        public ?CarbonImmutable $dateOfBirth = null,
        public Collection $divisions = new Collection,
        public ?CarbonImmutable $enrolmentDate = null,
        public Collection $externalSystemIds = new Collection,
        public ?string $forename = null,
        public ?string $fullName = null,
        public ?string $gender = null,
        public ?string $initials = null,
        public Collection $integrations = new Collection,
        public ?bool $isPartTime = null,
        public ?bool $isPersonalTutor = null,
        public ?bool $isTeachingAssistant = null,
        public ?bool $isTeachingStaff = null,
        public ?string $labelSalutation = null,
        public Collection $languageIsoMappings = new Collection,
        public array $languages = [],
        public ?CarbonImmutable $lastUpdated = null,
        public ?int $latestPhotoId = null,
        public ?CarbonImmutable $leavingDate = null,
        public ?string $letterSalutation = null,
        public ?string $maritalStatus = null,
        public ?string $middleNames = null,
        public array $nationalities = [],
        public Collection $nationalityIsoMappings = new Collection,
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
        public ?string $personGuid = null,
        public ?int $personId = null,
        public ?string $preferredName = null,
        public array $previousFamilyNames = [],
        public ?string $schoolEmailAddress = null,
        public ?string $schoolInitials = null,
        public ?string $schoolMobileNumber = null,
        public ?string $schoolSalutation = null,
        public ?string $schoolTelephoneNumber = null,
        public ?string $surname = null,
        public ?string $systemStatus = null,
        public ?string $title = null,
        public ?string $userCode = null,
        public ?string $userType = null,
    ) {
    }

    public function genderEnum(): ?EmployeeGender
    {
        return EmployeeGender::tryFrom((string) $this->gender);
    }

    public function systemStatusEnum(): ?EmployeeSystemStatus
    {
        return EmployeeSystemStatus::tryFrom((string) $this->systemStatus);
    }
}
