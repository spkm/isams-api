<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\GPATypes;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class GPAType extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $typeId = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?int $audits = null,
        public ?bool $builtIn = null,
        public ?string $builtInTitle = null,
        public ?string $code = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?int $cycle = null,
        public ?string $cycleCode = null,
        public ?int $cycleEndYear = null,
        public ?string $cycleName = null,
        public ?int $cycleStartYear = null,
        public ?string $description = null,
        public ?int $gpaSets = null,
        public ?int $gpaTypeCategory = null,
        public ?string $gpaTypeCategoryCode = null,
        public ?string $gpaTypeCategoryName = null,
        public ?int $gpaTypeCategoryOrder = null,
        public ?string $gradingPeriodIds = null,
        public ?int $gradingPeriods = null,
        public ?string $guid = null,
        public ?int $metadata = null,
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
