<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\Structure;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Period extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $ordinal = null,
        public ?string $name = null,
        public ?string $shortName = null,
        public ?CarbonImmutable $startTime = null,
        public ?CarbonImmutable $endTime = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
