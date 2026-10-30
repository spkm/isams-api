<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\GPASets;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class GPASet extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $typeId = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?int $audits = null,
        public ?int $calculations = null,
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
        public ?string $defaultTitle = null,
        public ?string $description = null,
        public ?string $gpaTypeIds = null,
        public ?int $gpaTypes = null,
        public ?int $gradeMarks = null,
        public ?string $guid = null,
        public ?string $legend = null,
        public ?int $levels = null,
        public ?int $metadata = null,
        public ?int $methods = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?string $statusTitle = null,
        public ?int $students = null,
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
