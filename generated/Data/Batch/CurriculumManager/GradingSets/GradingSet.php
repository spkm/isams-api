<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\GradingSets;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class GradingSet extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $typeId = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?int $audits = null,
        public ?string $code = null,
        public ?int $courses = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $curriculumIds = null,
        public ?int $curriculums = null,
        public ?int $cycle = null,
        public ?string $cycleCode = null,
        public ?int $cycleEndYear = null,
        public ?string $cycleName = null,
        public ?int $cycleStartYear = null,
        public ?bool $default = null,
        public ?string $defaultGradebookDescription = null,
        public ?string $defaultGradebookName = null,
        public ?string $defaultTitle = null,
        public ?string $description = null,
        public ?bool $displayClassGPA = null,
        public ?bool $displayClassGrade = null,
        public ?bool $displayClassMark = null,
        public ?int $displayClassOrder = null,
        public ?bool $displayCourseGPA = null,
        public ?bool $displayCourseGrade = null,
        public ?bool $displayCourseMark = null,
        public ?int $displayCourseOrder = null,
        public ?bool $displayGradesetCountRow = null,
        public ?bool $displayMaximumRow = null,
        public ?bool $displayMeanRow = null,
        public ?bool $displayMedianRow = null,
        public ?bool $displayMinimumRow = null,
        public ?bool $displayStandardDeviationRow = null,
        public ?bool $displayStudentGPA = null,
        public ?bool $displayStudentGrade = null,
        public ?bool $displayStudentMark = null,
        public ?int $displayStudentOrder = null,
        public ?string $gradebookGroupingCalculationCode = null,
        public ?bool $gradebookGroupingCalculationHidden = null,
        public ?string $gradebookGroupingCalculationName = null,
        public ?string $gradebookGroupingName = null,
        public ?int $gradebookGroupingOrder = null,
        public ?int $gradingPeriods = null,
        public ?string $gradingTypeIds = null,
        public ?int $gradingTypes = null,
        public ?string $guid = null,
        public ?string $lengthCurriculumIds = null,
        public ?int $lengthCurriculums = null,
        public ?int $lengths = null,
        public ?int $metadata = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?string $statusTitle = null,
        public ?int $type = null,
        public ?string $typeCode = null,
        public ?string $typeName = null,
        public ?int $typeOrder = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
        public ?string $userIds = null,
        public ?int $users = null,
    ) {
    }
}
