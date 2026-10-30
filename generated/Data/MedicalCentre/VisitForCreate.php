<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class VisitForCreate extends Data
{
    public function __construct(
        public CarbonImmutable $arrivalTimeStamp,
        public int $locationId,
        public string $reason,
        public int $sensitivity,
        public int $visitTypeId,
        public ?string $actionTaken = null,
        public ?int $arrivalLocationId = null,
        public ?int $departureLocationId = null,
        public ?CarbonImmutable $departureTimeStamp = null,
        public ?int $departureTransportId = null,
        public ?CarbonImmutable $followUp = null,
        public ?int $notificationType = null,
        public ?string $parentVisitKey = null,
        public ?int $staffNotificationType = null,
    ) {
    }
}
