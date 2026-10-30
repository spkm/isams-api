<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\CheckStatus;

readonly class EmployeeQualificationCheck extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $checkedByEmployeeId = null,
        public ?CarbonImmutable $dateChecked = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $qualificationEvidenced = null,
        public ?string $status = null,
    ) {
    }

    public function statusEnum(): ?CheckStatus
    {
        return CheckStatus::tryFrom((string) $this->status);
    }
}
