<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Contract extends Data
{
    protected const LISTS = ['schoolDivisions' => SchoolDivision::class];

    /**
     * @param  Collection<int, SchoolDivision>  $schoolDivisions
     */
    public function __construct(
        public ?int $id = null,
        public ?bool $archived = null,
        public ?string $censusRoleIdentifier = null,
        public ?int $censusRoleIdentifierId = null,
        public ?string $contractType = null,
        public ?int $contractTypeId = null,
        public ?bool $dailyRate = null,
        public ?CarbonImmutable $dateArchived = null,
        public ?CarbonImmutable $dateCreated = null,
        public ?int $employeeId = null,
        public ?string $employmentType = null,
        public ?CarbonImmutable $endDate = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $leavingDestination = null,
        public ?int $leavingDestinationId = null,
        public ?string $leavingReason = null,
        public ?int $leavingReasonId = null,
        public ?float $maxPayRange = null,
        public ?float $minPayRange = null,
        public ?string $name = null,
        public ?string $origin = null,
        public ?int $originId = null,
        public ?string $payFramework = null,
        public ?string $payRange = null,
        public ?int $payRangeId = null,
        public ?CarbonImmutable $payReviewDate = null,
        public ?string $post = null,
        public ?int $postId = null,
        public ?bool $safeguardedSalary = null,
        public Collection $schoolDivisions = new Collection,
        public ?string $staffLevel = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
