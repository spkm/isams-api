<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\CoverStaff;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Statistic extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $coverDate = null,
        public ?int $periodsCovered = null,
        public ?int $minutesCovered = null,
    ) {
    }
}
