<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Indicator extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $dateRaised = null,
        public ?string $details = null,
        public ?string $eventDetails = null,
        public ?int $indicatorStatusId = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $moduleId = null,
        public ?int $reasonForDismissalId = null,
        public ?string $title = null,
        public ?string $usercode = null,
    ) {
    }
}
