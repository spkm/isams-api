<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\TimetableAllocations;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class TimetableAllocation extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $week = null,
        public ?int $year = null,
        public ?int $timetableWeekId = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?int $division = null,
        public ?int $isoWeek = null,
        public ?int $isoYear = null,
    ) {
    }
}
