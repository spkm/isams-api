<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use spkm\IsamsApi\Data\Data;

readonly class Availability extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $available = null,
        public ?string $name = null,
        public ?int $periodId = null,
        public ?string $type = null,
    ) {
    }
}
