<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\DisclosureBarringServiceCheckStatus;

readonly class DisclosureBarringServiceCheck extends Data
{
    public function __construct(
        public ?int $checkedByEmployeeId = null,
        public ?CarbonImmutable $dateChecked = null,
        public ?CarbonImmutable $dateOfDisclosure = null,
        public ?CarbonImmutable $dateReceived = null,
        public ?CarbonImmutable $dateRequested = null,
        public ?string $dbsNumber = null,
        public ?string $disclosureType = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $notes = null,
        public ?int $requestedByEmployeeId = null,
        public ?string $status = null,
    ) {
    }

    public function statusEnum(): ?DisclosureBarringServiceCheckStatus
    {
        return DisclosureBarringServiceCheckStatus::tryFrom((string) $this->status);
    }
}
