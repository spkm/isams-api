<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use spkm\IsamsApi\Data\Data;

readonly class MedicalMedicationType extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?float $minimumStockLevel = null,
        public ?string $name = null,
        public ?bool $stockItem = null,
    ) {
    }
}
