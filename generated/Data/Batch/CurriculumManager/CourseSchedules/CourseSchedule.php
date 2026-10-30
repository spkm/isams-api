<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\CourseSchedules;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class CourseSchedule extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $courseId = null,
        public ?int $cycleId = null,
        public ?int $scheduleId = null,
        public ?int $typeId = null,
        public ?int $audits = null,
        public ?int $classes = null,
        public ?int $course = null,
        public ?string $courseCode = null,
        public ?string $courseName = null,
        public ?int $courseOrder = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?int $cycle = null,
        public ?string $cycleCode = null,
        public ?string $cycleName = null,
        public ?int $cycleStartYear = null,
        public ?string $guid = null,
        public ?int $schedule = null,
        public ?string $scheduleCode = null,
        public ?string $scheduleName = null,
        public ?int $scheduleOrder = null,
        public ?int $termDates = null,
        public ?int $type = null,
        public ?string $typeCode = null,
        public ?string $typeName = null,
        public ?int $typeOrder = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
    ) {
    }
}
