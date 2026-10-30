<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\TermDates;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class TermDate extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $termSetId = null,
        public ?int $termTypeId = null,
        public ?int $typeId = null,
        public ?int $audits = null,
        public ?int $children = null,
        public ?string $code = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?int $cycle = null,
        public ?string $cycleCode = null,
        public ?string $cycleName = null,
        public ?int $cycleStartYear = null,
        public ?string $description = null,
        public ?CarbonImmutable $endDateTime_utc = null,
        public ?string $guid = null,
        public ?int $metadata = null,
        public ?string $name = null,
        public ?int $parent = null,
        public ?int $schedules = null,
        public ?CarbonImmutable $startDateTime_utc = null,
        public ?int $termSet = null,
        public ?string $termSetCode = null,
        public ?string $termSetName = null,
        public ?int $termSetOrder = null,
        public ?int $termSetType = null,
        public ?int $termType = null,
        public ?string $termTypeCode = null,
        public ?string $termTypeName = null,
        public ?int $termTypeOrder = null,
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
