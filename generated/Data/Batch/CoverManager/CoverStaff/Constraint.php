<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\CoverStaff;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Constraint extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $day = null,
        public ?CarbonImmutable $startTime = null,
        public ?CarbonImmutable $endTime = null,
        public ?int $weighting = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
