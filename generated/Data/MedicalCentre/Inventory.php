<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\Enums\RecordType;

readonly class Inventory extends Data
{
    public function __construct(
        public ?bool $archived = null,
        public ?CarbonImmutable $dateOut = null,
        public ?string $description = null,
        public ?CarbonImmutable $dueDate = null,
        public ?int $inventoryTypeId = null,
        public ?string $key = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?int $locationId = null,
        public ?string $notes = null,
        public ?float $quantity = null,
        public ?string $recordType = null,
        public ?int $sensitivity = null,
        public ?int $stockLocationId = null,
        public ?float $stockQuantity = null,
        public ?int $typeId = null,
    ) {
    }

    public function recordTypeEnum(): ?RecordType
    {
        return RecordType::tryFrom((string) $this->recordType);
    }
}
