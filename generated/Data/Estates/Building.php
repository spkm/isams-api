<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Estates;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Building extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public ?bool $hasClassrooms = null,
        public ?string $initials = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?string $name = null,
        public ?int $ordinal = null,
    ) {
    }
}
