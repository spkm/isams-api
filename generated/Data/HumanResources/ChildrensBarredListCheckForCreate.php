<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\ChildrensBarredListCheckForCreateStatus;

readonly class ChildrensBarredListCheckForCreate extends Data
{
    public function __construct(
        public ?int $checkedByEmployeeId = null,
        public ?CarbonImmutable $dateChecked = null,
        public ?CarbonImmutable $dateReceived = null,
        public ?CarbonImmutable $dateRequested = null,
        public ?string $notes = null,
        public ?int $requestedByEmployeeId = null,
        public ?string $status = null,
    ) {
    }

    public function statusEnum(): ?ChildrensBarredListCheckForCreateStatus
    {
        return ChildrensBarredListCheckForCreateStatus::tryFrom((string) $this->status);
    }
}
