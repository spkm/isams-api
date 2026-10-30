<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\Entities;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Entity extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $exportId = null,
        public ?int $importId = null,
        public ?int $typeId = null,
        public ?int $activeFilters = null,
        public ?int $activeGroupBys = null,
        public ?int $activeGroupings = null,
        public ?int $activeViews = null,
        public ?int $audits = null,
        public ?string $code = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $description = null,
        public ?bool $export = null,
        public ?string $fieldIds = null,
        public ?int $fields = null,
        public ?int $filterHeight = null,
        public ?string $filterIds = null,
        public ?int $filters = null,
        public ?string $group = null,
        public ?string $groupByIds = null,
        public ?int $groupBys = null,
        public ?bool $grouping = null,
        public ?string $groupingIds = null,
        public ?int $groupings = null,
        public ?string $guid = null,
        public ?string $image = null,
        public ?bool $import = null,
        public ?string $name = null,
        public ?int $type = null,
        public ?string $typeCode = null,
        public ?string $typeName = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
        public ?int $version = null,
        public ?string $viewIds = null,
        public ?int $views = null,
    ) {
    }
}
