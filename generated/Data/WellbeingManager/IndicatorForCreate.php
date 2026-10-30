<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class IndicatorForCreate extends Data
{
    public function __construct(
        public CarbonImmutable $dateRaised,
        public int $indicatorStatusId,
        public string $moduleId,
        public string $title,
        public string $usercode,
        public ?string $details = null,
        public ?string $eventDetails = null,
        public ?CarbonImmutable $raisedOn = null,
    ) {
    }
}
