<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class Activity extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?bool $eventsEnabled = null,
        public ?bool $groupsEnabled = null,
        public ?string $image = null,
        public ?string $name = null,
        public ?bool $schedulesEnabled = null,
    ) {
    }
}
