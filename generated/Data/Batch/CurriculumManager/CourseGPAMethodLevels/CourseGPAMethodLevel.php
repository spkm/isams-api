<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\CourseGPAMethodLevels;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class CourseGPAMethodLevel extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $courseId = null,
        public ?int $cycleId = null,
        public ?int $gpaLevelId = null,
        public ?int $gpaMethodId = null,
        public ?int $gpaSetId = null,
        public ?int $typeId = null,
        public ?int $audits = null,
        public ?int $course = null,
        public ?string $courseCode = null,
        public ?string $courseName = null,
        public ?int $courseOrder = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $credit = null,
        public ?int $cycle = null,
        public ?string $cycleCode = null,
        public ?int $cycleEndYear = null,
        public ?string $cycleName = null,
        public ?int $cycleStartYear = null,
        public ?int $gpaLevel = null,
        public ?string $gpaLevelCode = null,
        public ?string $gpaLevelName = null,
        public ?int $gpaLevelOrder = null,
        public ?int $gpaMethod = null,
        public ?string $gpaMethodCode = null,
        public ?bool $gpaMethodDefault = null,
        public ?string $gpaMethodDefaultTitle = null,
        public ?string $gpaMethodName = null,
        public ?int $gpaMethodOrder = null,
        public ?int $gpaSet = null,
        public ?string $gpaSetCode = null,
        public ?string $gpaSetName = null,
        public ?int $gpaSetOrder = null,
        public ?string $guid = null,
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
