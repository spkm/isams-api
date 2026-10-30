<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Role extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
    ) {
    }
}
