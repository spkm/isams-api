<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeQualificationCheckForCreateStatus;

readonly class EmployeeQualificationCheckForCreate extends Data
{
    public function __construct(
        public ?int $checkedByEmployeeId = null,
        public ?CarbonImmutable $dateChecked = null,
        public ?string $qualificationEvidenced = null,
        public ?string $status = null,
    ) {
    }

    public function statusEnum(): ?EmployeeQualificationCheckForCreateStatus
    {
        return EmployeeQualificationCheckForCreateStatus::tryFrom((string) $this->status);
    }
}
