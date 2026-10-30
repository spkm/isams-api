<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\TermSets;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class TermSet extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $typeId = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?int $audits = null,
        public ?string $code = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $curriculumIds = null,
        public ?int $curriculums = null,
        public ?int $cycles = null,
        public ?bool $default = null,
        public ?string $defaultTitle = null,
        public ?string $description = null,
        public ?string $guid = null,
        public ?int $metadata = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?string $statusTitle = null,
        public ?int $termDates = null,
        public ?string $termTypeIds = null,
        public ?int $termTypes = null,
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
