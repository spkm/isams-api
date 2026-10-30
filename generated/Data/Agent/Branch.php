<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Agent;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Branch extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $customFields = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
    ) {
    }
}
