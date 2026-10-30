<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Discipline;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class DetentionSession extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $cutoffDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?int $locationId = null,
        public ?string $name = null,
        public ?int $recurrence = null,
        public ?CarbonImmutable $startDate = null,
        public ?string $type = null,
    ) {
    }
}
