<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\CourseCategories;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class CourseCategory extends BatchData
{
    public function __construct(
        public ?int $id = null,
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
        public ?bool $default = null,
        public ?string $defaultTitle = null,
        public ?string $description = null,
        public ?string $guid = null,
        public ?int $metadata = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?string $type = null,
        public ?string $typeTitle = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
    ) {
    }
}
