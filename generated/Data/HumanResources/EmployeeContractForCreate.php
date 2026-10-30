<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class EmployeeContractForCreate extends Data
{
    /**
     * @param  list<int>|null  $schoolDivisionIds
     */
    public function __construct(
        public ?string $employeeLevel = null,
        public ?string $employmentType = null,
        public ?CarbonImmutable $endDate = null,
        public ?array $schoolDivisionIds = null,
        public ?CarbonImmutable $startDate = null,
        public ?string $title = null,
    ) {
    }
}
