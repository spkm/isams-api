<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\Curriculums;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Curriculum extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $typeId = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?bool $archived = null,
        public ?string $archivedTitle = null,
        public ?int $audits = null,
        public ?int $blocks = null,
        public ?string $code = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $curriculumStudentYearIds = null,
        public ?int $curriculumStudentYears = null,
        public ?string $curriculumTeacherYearIds = null,
        public ?int $curriculumTeacherYears = null,
        public ?bool $default = null,
        public ?int $defaultLevel = null,
        public ?string $defaultLevelCode = null,
        public ?string $defaultLevelName = null,
        public ?string $defaultTitle = null,
        public ?string $description = null,
        public ?string $divisionIds = null,
        public ?int $divisions = null,
        public ?string $emailAddress = null,
        public ?int $gpaSets = null,
        public ?int $gradeSets = null,
        public ?int $gradingSets = null,
        public ?string $guid = null,
        public ?int $lengths = null,
        public ?string $levelIds = null,
        public ?int $levels = null,
        public ?int $metadata = null,
        public ?int $model = null,
        public ?string $modelCode = null,
        public ?string $modelName = null,
        public ?int $modelOrder = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?int $standardItems = null,
        public ?int $standardSets = null,
        public ?string $statusTitle = null,
        public ?string $studentIds = null,
        public ?int $students = null,
        public ?bool $studentSync = null,
        public ?string $teacherIds = null,
        public ?int $teachers = null,
        public ?bool $teacherSync = null,
        public ?int $termSets = null,
        public ?int $type = null,
        public ?string $typeCode = null,
        public ?string $typeName = null,
        public ?int $typeOrder = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
        public ?string $website = null,
    ) {
    }
}
