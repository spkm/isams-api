<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class ActionStatus extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $default = null,
        public ?bool $isClosed = null,
        public ?bool $isOpen = null,
        public ?string $name = null,
    ) {
    }
}
