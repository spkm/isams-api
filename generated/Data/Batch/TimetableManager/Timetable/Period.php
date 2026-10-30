<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\Timetable;

use spkm\IsamsApi\Batch\BatchData;

readonly class Period extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $periodType = null,
        public ?int $setId = null,
        public ?int $formId = null,
        public ?int $teacherId = null,
        public ?int $subjectId = null,
        public ?int $roomId = null,
        public ?int $meetingGroupId = null,
        public ?int $yearScheduleId = null,
        public ?int $tutorialId = null,
        public ?int $availabilityId = null,
        public ?bool $isHidden = null,
    ) {
    }
}
