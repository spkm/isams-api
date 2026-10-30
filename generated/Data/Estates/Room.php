<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Estates;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Room extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $buildingId = null,
        public ?int $capacity = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?string $name = null,
    ) {
    }
}
