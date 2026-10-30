<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class MedicationForCreate extends Data
{
    public function __construct(
        public bool $consent,
        public string $dose,
        public CarbonImmutable $issueDate,
        public int $locationId,
        public int $medicationTypeId,
        public int $supplierId,
        public ?CarbonImmutable $expiryDate = null,
        public ?string $name = null,
        public ?string $notes = null,
        public ?int $notificationType = null,
        public ?int $sensitivity = null,
        public ?int $staffNotificationType = null,
    ) {
    }
}
