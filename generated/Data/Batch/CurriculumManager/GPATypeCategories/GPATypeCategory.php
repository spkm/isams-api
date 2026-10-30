<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\GPATypeCategories;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class GPATypeCategory extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $audits = null,
        public ?string $code = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $description = null,
        public ?string $guid = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
    ) {
    }
}
