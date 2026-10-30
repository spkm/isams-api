<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\Metadata;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Metadata extends BatchData
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
        public ?bool $defaultBooleanValue = null,
        public ?int $defaultIntegerValue = null,
        public ?string $defaultStringValue = null,
        public ?string $description = null,
        public ?int $entities = null,
        public ?string $entityIds = null,
        public ?string $guid = null,
        public ?bool $multiple = null,
        public ?string $multipleTitle = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?int $records = null,
        public ?string $statusTitle = null,
        public ?string $type = null,
        public ?string $typeTitle = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
    ) {
    }
}
