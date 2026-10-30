<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class GroupStructureForCreate extends Data
{
    public function __construct(
        public string $name,
        public ?CarbonImmutable $dateAvailableFrom = null,
        public ?CarbonImmutable $dateAvailableTo = null,
        public ?int $parentId = null,
        public ?int $styleDesignId = null,
    ) {
    }
}
