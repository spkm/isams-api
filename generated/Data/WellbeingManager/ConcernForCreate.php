<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ConcernForCreate extends Data
{
    /**
     * @param  list<int>|null  $concernAreas
     */
    public function __construct(
        public int $concernStatusId,
        public CarbonImmutable $raisedDate,
        public string $sourceId,
        public int $typeId,
        public ?array $concernAreas = null,
        public ?int $concernSeverityId = null,
        public ?string $details = null,
        public ?bool $hasAccess = null,
        public ?int $indicatorId = null,
        public ?string $location = null,
        public ?string $nature = null,
    ) {
    }
}
