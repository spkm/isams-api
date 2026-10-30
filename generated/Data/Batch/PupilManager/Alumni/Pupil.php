<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\Alumni;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Pupil extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $personId = null,
        public ?string $personGuid = null,
        public ?string $upn = null,
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
        public ?string $emailAddress = null,
        public ?CarbonImmutable $leavingDate = null,
        public ?string $leavingTerm = null,
        public ?int $leavingSchoolYear = null,
        public ?int $familyId = null,
        public ?string $schoolCode = null,
        public ?string $leavingAcademicHouse = null,
        public ?string $leavingBoardingHouse = null,
        public ?string $ethnicity = null,
        public ?string $leavingReason = null,
        public ?int $futureSchoolId = null,
        public ?string $futureSchoolType = null,
    ) {
    }
}
