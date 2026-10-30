<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeRightToWorkCheckForUpdateStatus;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeRightToWorkCheckForUpdateType;

readonly class EmployeeRightToWorkCheckForUpdate extends Data
{
    public function __construct(
        public ?string $checkCarriedOut = null,
        public ?int $checkedByEmployeeId = null,
        public ?CarbonImmutable $dateChecked = null,
        public ?string $evidenceSeen = null,
        public ?string $status = null,
        public ?string $type = null,
    ) {
    }

    public function statusEnum(): ?EmployeeRightToWorkCheckForUpdateStatus
    {
        return EmployeeRightToWorkCheckForUpdateStatus::tryFrom((string) $this->status);
    }

    public function typeEnum(): ?EmployeeRightToWorkCheckForUpdateType
    {
        return EmployeeRightToWorkCheckForUpdateType::tryFrom((string) $this->type);
    }
}
