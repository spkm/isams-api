<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\RewardsAndConduct;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Category extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public ?bool $isActive = null,
        public ?bool $isDefaultCategory = null,
        public ?bool $isDescriptionRequired = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
        public ?int $ordinal = null,
        public ?int $value = null,
    ) {
    }
}
