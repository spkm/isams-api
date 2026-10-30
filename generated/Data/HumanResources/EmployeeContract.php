<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class EmployeeContract extends Data
{
    /**
     * @param  list<int>  $schoolDivisionIds
     */
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $archivedDate = null,
        public ?string $employeeLevel = null,
        public ?string $employmentType = null,
        public ?CarbonImmutable $endDate = null,
        public ?bool $isArchived = null,
        public ?CarbonImmutable $lastUpdated = null,
        public array $schoolDivisionIds = [],
        public ?CarbonImmutable $startDate = null,
        public ?string $title = null,
    ) {
    }
}
