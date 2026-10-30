<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\Applicants;

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
        public ?string $upn = null,
        public ?string $schoolId = null,
        public ?string $title = null,
        public ?string $forename = null,
        public ?string $surname = null,
        public ?string $middlename = null,
        public ?string $initials = null,
        public ?string $preferredname = null,
        public ?string $fullname = null,
        public ?string $gender = null,
        public ?CarbonImmutable $dob = null,
        public ?int $familyId = null,
        public ?string $admissionsStatus = null,
        public ?string $schoolCode = null,
        public ?int $enrolmentSchoolYear = null,
        public ?int $enrolmentNCYear = null,
        public ?CarbonImmutable $enrolmentDate = null,
        public ?string $enrolmentTerm = null,
        public ?bool $isReAdmission = null,
        public ?string $ethnicity = null,
        public ?int $currentSchoolId = null,
        public ?CarbonImmutable $registeredDate = null,
        public Collection $customFields = new Collection,
    ) {
    }
}
