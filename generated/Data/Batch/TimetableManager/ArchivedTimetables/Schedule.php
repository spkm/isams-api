<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\ArchivedTimetables;

use spkm\IsamsApi\Batch\BatchData;

readonly class Schedule extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $teacher = null,
        public ?int $periodId = null,
        public ?int $roomId = null,
        public ?string $room = null,
        public ?bool $complete = null,
        public ?int $setId = null,
    ) {
    }
}
