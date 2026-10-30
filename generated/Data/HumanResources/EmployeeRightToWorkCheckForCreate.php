<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeRightToWorkCheckForCreateStatus;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeRightToWorkCheckForCreateType;

readonly class EmployeeRightToWorkCheckForCreate extends Data
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

    public function statusEnum(): ?EmployeeRightToWorkCheckForCreateStatus
    {
        return EmployeeRightToWorkCheckForCreateStatus::tryFrom((string) $this->status);
    }

    public function typeEnum(): ?EmployeeRightToWorkCheckForCreateType
    {
        return EmployeeRightToWorkCheckForCreateType::tryFrom((string) $this->type);
    }
}
