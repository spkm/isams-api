<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\Blocks;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Block extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $typeId = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?string $code = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $curriculumIds = null,
        public ?int $cycle = null,
        public ?string $cycleCode = null,
        public ?string $cycleName = null,
        public ?string $dayIds = null,
        public ?string $description = null,
        public ?string $guid = null,
        public ?int $metadata = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?string $periodIds = null,
        public ?string $subjectDepartmentIds = null,
        public ?int $type = null,
        public ?string $typeCode = null,
        public ?string $typeName = null,
        public ?int $typeOrder = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
        public ?string $yearIds = null,
    ) {
    }
}
