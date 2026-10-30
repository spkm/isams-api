<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ConcernVisibility extends Data
{
    public function __construct(
        public ?int $concernId = null,
        public ?bool $deleted = null,
        public ?string $fullName = null,
        public ?string $groupNames = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $usercode = null,
        public ?bool $visible = null,
    ) {
    }
}
