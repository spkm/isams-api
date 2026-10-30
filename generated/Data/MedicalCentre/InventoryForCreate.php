<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class InventoryForCreate extends Data
{
    public function __construct(
        public CarbonImmutable $dateOut,
        public int $inventoryTypeId,
        public ?bool $archived = null,
        public ?string $description = null,
        public ?CarbonImmutable $dueDate = null,
        public ?int $locationId = null,
        public ?string $notes = null,
        public ?float $quantity = null,
        public ?int $sensitivity = null,
    ) {
    }
}
