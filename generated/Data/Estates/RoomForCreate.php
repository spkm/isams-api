<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Estates;

use spkm\IsamsApi\Data\Data;

readonly class RoomForCreate extends Data
{
    public function __construct(
        public ?int $buildingId = null,
        public ?int $capacity = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?string $name = null,
    ) {
    }
}
