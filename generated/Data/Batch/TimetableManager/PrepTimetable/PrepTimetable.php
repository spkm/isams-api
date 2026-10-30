<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\PrepTimetable;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class PrepTimetable extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $day = null,
        public ?int $year = null,
        public ?string $name = null,
        public ?int $ordinal = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
