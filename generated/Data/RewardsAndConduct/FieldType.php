<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\RewardsAndConduct;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class FieldType extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?bool $isActive = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
        public ?int $ordinal = null,
    ) {
    }
}
