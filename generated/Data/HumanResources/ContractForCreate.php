<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ContractForCreate extends Data
{
    /**
     * @param  list<int>|null  $schoolDivisions
     */
    public function __construct(
        public ?int $censusRoleIdentifierId = null,
        public ?int $contractTypeId = null,
        public ?bool $dailyRate = null,
        public ?int $employeeId = null,
        public ?string $employmentType = null,
        public ?CarbonImmutable $endDate = null,
        public ?int $leavingDestinationId = null,
        public ?int $leavingReasonId = null,
        public ?float $maxPayRange = null,
        public ?float $minPayRange = null,
        public ?string $name = null,
        public ?int $originId = null,
        public ?string $payFramework = null,
        public ?int $payRangeId = null,
        public ?CarbonImmutable $payReviewDate = null,
        public ?int $postId = null,
        public ?bool $safeguardedSalary = null,
        public ?array $schoolDivisions = null,
        public ?string $staffLevel = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
