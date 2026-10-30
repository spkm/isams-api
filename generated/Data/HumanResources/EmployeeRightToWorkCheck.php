<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeRightToWorkCheckStatus;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeRightToWorkCheckType;

readonly class EmployeeRightToWorkCheck extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $checkCarriedOut = null,
        public ?int $checkedByEmployeeId = null,
        public ?CarbonImmutable $dateChecked = null,
        public ?string $evidenceSeen = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $status = null,
        public ?string $type = null,
    ) {
    }

    public function statusEnum(): ?EmployeeRightToWorkCheckStatus
    {
        return EmployeeRightToWorkCheckStatus::tryFrom((string) $this->status);
    }

    public function typeEnum(): ?EmployeeRightToWorkCheckType
    {
        return EmployeeRightToWorkCheckType::tryFrom((string) $this->type);
    }
}
