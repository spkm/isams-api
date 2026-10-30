<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Visit extends Data
{
    public function __construct(
        public ?string $actionTaken = null,
        public ?int $arrivalLocationId = null,
        public ?CarbonImmutable $arrivalTimeStamp = null,
        public ?int $departureLocationId = null,
        public ?CarbonImmutable $departureTimeStamp = null,
        public ?int $departureTransportId = null,
        public ?CarbonImmutable $followUp = null,
        public ?string $key = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?int $locationId = null,
        public ?int $notificationType = null,
        public ?string $parentVisitKey = null,
        public ?string $reason = null,
        public ?int $sensitivity = null,
        public ?int $staffNotificationType = null,
        public ?int $visitTypeId = null,
    ) {
    }
}
