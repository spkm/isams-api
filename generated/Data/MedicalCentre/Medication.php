<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\Enums\MedicationRecordType;

readonly class Medication extends Data
{
    public function __construct(
        public ?bool $consent = null,
        public ?string $dose = null,
        public ?CarbonImmutable $expiryDate = null,
        public ?CarbonImmutable $issueDate = null,
        public ?string $key = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?int $locationId = null,
        public ?int $medicationTypeId = null,
        public ?string $name = null,
        public ?string $notes = null,
        public ?int $notificationType = null,
        public ?string $recordType = null,
        public ?int $sensitivity = null,
        public ?int $staffNotificationType = null,
        public ?int $stockLocationId = null,
        public ?float $stockQuantity = null,
        public ?int $supplierId = null,
        public ?int $typeId = null,
    ) {
    }

    public function recordTypeEnum(): ?MedicationRecordType
    {
        return MedicationRecordType::tryFrom((string) $this->recordType);
    }
}
