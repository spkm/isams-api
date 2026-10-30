<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Pupil extends BatchData
{
    protected const LISTS = ['customFields' => CustomField::class];

    /**
     * @param  Collection<int, CustomField>  $customFields
     */
    public function __construct(
        public ?int $id = null,
        public ?int $personId = null,
        public ?string $personGuid = null,
        public ?int $divisionId = null,
        public ?int $academicHouseId = null,
        public ?int $boardingHouseId = null,
        public ?string $upn = null,
        public ?string $schoolCode = null,
        public ?string $schoolId = null,
        public ?string $userCode = null,
        public ?string $userName = null,
        public ?string $title = null,
        public ?string $forename = null,
        public ?string $surname = null,
        public ?string $middlename = null,
        public ?string $initials = null,
        public ?string $preferredname = null,
        public ?string $fullname = null,
        public ?string $gender = null,
        public ?CarbonImmutable $dob = null,
        public ?string $academicHouse = null,
        public ?string $boardingHouse = null,
        public ?string $form = null,
        public ?int $ncYear = null,
        public ?string $divisionName = null,
        public ?string $emailAddress = null,
        public ?string $mobileNumber = null,
        public ?string $pupilType = null,
        public ?CarbonImmutable $enrolmentDate = null,
        public ?string $enrolmentTerm = null,
        public ?int $enrolmentSchoolYear = null,
        public ?int $familyId = null,
        public ?string $nationalities = null,
        public ?string $languages = null,
        public ?string $tutor = null,
        public ?string $ethnicity = null,
        public ?string $leavingReason = null,
        public ?CarbonImmutable $leavingDate = null,
        public ?int $futureSchoolId = null,
        public ?string $futureSchoolType = null,
        public Collection $customFields = new Collection,
    ) {
    }
}
