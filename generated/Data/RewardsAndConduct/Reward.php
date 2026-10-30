<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\RewardsAndConduct;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Reward extends Data
{
    protected const LISTS = ['fieldTypes' => RewardFieldType::class];

    /**
     * @param  Collection<int, RewardFieldType>  $fieldTypes
     */
    public function __construct(
        public ?int $id = null,
        public ?int $authorised = null,
        public ?string $authorisedBy = null,
        public ?CarbonImmutable $authorisedDate = null,
        public ?RewardCategory $category = null,
        public ?string $configuration = null,
        public ?CarbonImmutable $date = null,
        public ?RewardDepartment $department = null,
        public ?string $description = null,
        public Collection $fieldTypes = new Collection,
        public ?string $guid = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?RewardModuleType $moduleType = null,
        public ?bool $rejected = null,
        public ?string $rejectedBy = null,
        public ?CarbonImmutable $rejectedDateTime = null,
        public ?string $rejectedNotes = null,
        public ?bool $resolved = null,
        public ?string $resolvedBy = null,
        public ?string $resolvedComments = null,
        public ?CarbonImmutable $resolvedDate = null,
        public ?string $resolvedNote = null,
        public ?string $schoolId = null,
        public ?RewardSubject $subject = null,
        public ?string $submitBy = null,
        public ?RewardTeacher $teacher = null,
    ) {
    }
}
