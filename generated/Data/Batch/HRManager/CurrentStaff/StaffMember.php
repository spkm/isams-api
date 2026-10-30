<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\HRManager\CurrentStaff;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class StaffMember extends BatchData
{
    protected const LISTS = ['divisions' => Division::class, 'roles' => Role::class, 'customFields' => CustomField::class];

    /**
     * @param  Collection<int, Division>  $divisions
     * @param  Collection<int, Role>  $roles
     * @param  Collection<int, CustomField>  $customFields
     */
    public function __construct(
        public ?int $id = null,
        public ?int $personId = null,
        public ?string $personGuid = null,
        public ?string $previousMISId = null,
        public ?string $initials = null,
        public ?string $userCode = null,
        public ?string $userName = null,
        public ?string $title = null,
        public ?string $forename = null,
        public ?string $middleNames = null,
        public ?string $surname = null,
        public ?string $fullName = null,
        public ?string $nameInitials = null,
        public ?string $preferredName = null,
        public ?string $salutation = null,
        public ?CarbonImmutable $dob = null,
        public ?string $gender = null,
        public ?string $schoolEmailAddress = null,
        public ?string $schoolMobileNumber = null,
        public ?string $personalMobileNumber = null,
        public ?bool $teachingStaff = null,
        public ?CarbonImmutable $leavingDate = null,
        public Collection $divisions = new Collection,
        public Collection $roles = new Collection,
        public Collection $customFields = new Collection,
    ) {
    }
}
