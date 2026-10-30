<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class PastoralFlag extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $flagTypeId = null,
        public ?string $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $notes = null,
        public ?string $schoolId = null,
    ) {
    }
}
