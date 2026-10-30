<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ConcernDocument extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $concernId = null,
        public ?string $fileName = null,
        public ?string $filePath = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $name = null,
    ) {
    }
}
