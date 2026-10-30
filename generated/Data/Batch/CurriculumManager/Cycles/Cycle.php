<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\Cycles;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Cycle extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?bool $archived = null,
        public ?string $archivedTitle = null,
        public ?int $audits = null,
        public ?int $blocks = null,
        public ?int $classes = null,
        public ?string $code = null,
        public ?int $courses = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $description = null,
        public ?int $endYear = null,
        public ?int $gpaSets = null,
        public ?int $gpaTypes = null,
        public ?int $gradeMarks = null,
        public ?int $gradeSets = null,
        public ?int $gradingSets = null,
        public ?int $gradingTemplates = null,
        public ?int $gradingTypes = null,
        public ?int $graduationYear = null,
        public ?string $guid = null,
        public ?int $lengths = null,
        public ?int $metadata = null,
        public ?string $name = null,
        public ?int $rules = null,
        public ?int $standardItems = null,
        public ?int $standardSets = null,
        public ?int $startYear = null,
        public ?string $statusTitle = null,
        public ?int $termDates = null,
        public ?int $timetable = null,
        public ?int $timetableEndYear = null,
        public ?string $timetableName = null,
        public ?int $timetablePublished = null,
        public ?int $timetableStartYear = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
    ) {
    }
}
