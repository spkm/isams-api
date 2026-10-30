<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\GPAGradeMarkPoints;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class GPAGradeMarkPoint extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $gpaGradeMarkId = null,
        public ?int $gpaLevelId = null,
        public ?int $gpaMethodId = null,
        public ?int $gpaSetId = null,
        public ?int $gradeMarkId = null,
        public ?int $typeId = null,
        public ?int $audits = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?int $cycle = null,
        public ?string $cycleCode = null,
        public ?int $cycleEndYear = null,
        public ?string $cycleName = null,
        public ?int $cycleStartYear = null,
        public ?string $description = null,
        public ?int $gpaGradeMark = null,
        public ?int $gpaGradeMarkOrder = null,
        public ?int $gpaLevel = null,
        public ?string $gpaLevelCode = null,
        public ?string $gpaLevelName = null,
        public ?int $gpaMethod = null,
        public ?string $gpaMethodCode = null,
        public ?string $gpaMethodName = null,
        public ?int $gpaSet = null,
        public ?string $gpaSetCode = null,
        public ?string $gpaSetName = null,
        public ?int $gpaSetOrder = null,
        public ?int $gradeMark = null,
        public ?bool $gradeMarkActive = null,
        public ?string $gradeMarkCode = null,
        public ?string $gradeMarkDescription = null,
        public ?bool $gradeMarkEarned = null,
        public ?bool $gradeMarkFailed = null,
        public ?bool $gradeMarkGPA = null,
        public ?float $gradeMarkMaximum = null,
        public ?float $gradeMarkMinimum = null,
        public ?string $gradeMarkName = null,
        public ?int $gradeMarkOrder = null,
        public ?float $gradeMarkValue = null,
        public ?string $guid = null,
        public ?float $point = null,
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
