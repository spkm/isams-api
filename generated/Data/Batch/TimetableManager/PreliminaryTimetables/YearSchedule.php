<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\PreliminaryTimetables;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class YearSchedule extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?int $nationalCurriculumYear = null,
        public ?int $periodId = null,
        public ?int $roomId = null,
        public ?string $teacherId = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
