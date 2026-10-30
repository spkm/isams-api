<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\AbsenceForUpdateAbsenceCategoryCode;

readonly class AbsenceForUpdate extends Data
{
    public function __construct(
        public ?string $absenceCategoryCode = null,
        public ?int $absenceTypeId = null,
        public ?int $employeeId = null,
        public ?CarbonImmutable $endDate = null,
        public ?string $notes = null,
        public ?CarbonImmutable $startDate = null,
        public ?float $workingDaysLost = null,
    ) {
    }

    public function absenceCategoryCodeEnum(): ?AbsenceForUpdateAbsenceCategoryCode
    {
        return AbsenceForUpdateAbsenceCategoryCode::tryFrom((string) $this->absenceCategoryCode);
    }
}
