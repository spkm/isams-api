<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeReferenceCheckStatus;

readonly class EmployeeReferenceCheck extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $checkedByEmployeeId = null,
        public ?CarbonImmutable $dateChecked = null,
        public ?CarbonImmutable $dateReceived = null,
        public ?CarbonImmutable $dateRequested = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $referenceFrom = null,
        public ?string $status = null,
    ) {
    }

    public function statusEnum(): ?EmployeeReferenceCheckStatus
    {
        return EmployeeReferenceCheckStatus::tryFrom((string) $this->status);
    }
}
