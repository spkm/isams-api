<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\LessonSuspensions;

use spkm\IsamsApi\Batch\BatchData;

readonly class LinkedSchedule extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $scheduleId = null,
        public ?int $periodId = null,
        public ?int $roomId = null,
        public ?int $teacherId = null,
    ) {
    }
}
