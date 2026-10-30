<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Period extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $author = null,
        public ?string $endTime = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
        public ?int $ordinal = null,
        public ?string $shortName = null,
        public ?string $startTime = null,
    ) {
    }
}
