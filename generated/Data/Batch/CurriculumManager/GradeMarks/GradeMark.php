<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\GradeMarks;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class GradeMark extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $typeId = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?int $audits = null,
        public ?string $code = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?int $cycle = null,
        public ?string $cycleCode = null,
        public ?int $cycleEndYear = null,
        public ?string $cycleName = null,
        public ?int $cycleStartYear = null,
        public ?string $defaultGPAPoint = null,
        public ?string $description = null,
        public ?bool $earned = null,
        public ?string $earnedTitle = null,
        public ?bool $failed = null,
        public ?string $failedTitle = null,
        public ?bool $gpa = null,
        public ?string $gpaTitle = null,
        public ?int $gradeSets = null,
        public ?string $guid = null,
        public ?string $legend = null,
        public ?float $maximum = null,
        public ?int $metadata = null,
        public ?float $minimum = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?string $report = null,
        public ?string $statusTitle = null,
        public ?string $transcript = null,
        public ?int $type = null,
        public ?string $typeCode = null,
        public ?string $typeName = null,
        public ?int $typeOrder = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
        public ?float $value = null,
    ) {
    }
}
