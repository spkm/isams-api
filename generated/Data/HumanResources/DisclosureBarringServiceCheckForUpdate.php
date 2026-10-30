<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\DisclosureBarringServiceCheckForUpdateStatus;

readonly class DisclosureBarringServiceCheckForUpdate extends Data
{
    public function __construct(
        public ?int $checkedByEmployeeId = null,
        public ?CarbonImmutable $dateChecked = null,
        public ?CarbonImmutable $dateOfDisclosure = null,
        public ?CarbonImmutable $dateReceived = null,
        public ?CarbonImmutable $dateRequested = null,
        public ?string $dbsNumber = null,
        public ?string $disclosureType = null,
        public ?string $notes = null,
        public ?int $requestedByEmployeeId = null,
        public ?string $status = null,
    ) {
    }

    public function statusEnum(): ?DisclosureBarringServiceCheckForUpdateStatus
    {
        return DisclosureBarringServiceCheckForUpdateStatus::tryFrom((string) $this->status);
    }
}
