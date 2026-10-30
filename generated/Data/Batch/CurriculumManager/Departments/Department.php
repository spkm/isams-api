<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\Departments;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Department extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $typeId = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?bool $archived = null,
        public ?string $archivedTitle = null,
        public ?int $audits = null,
        public ?int $blocks = null,
        public ?int $classes = null,
        public ?string $code = null,
        public ?int $courses = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $description = null,
        public ?string $divisionIds = null,
        public ?int $divisions = null,
        public ?string $emailAddress = null,
        public ?string $headIds = null,
        public ?int $heads = null,
        public ?int $metadata = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?int $standardItems = null,
        public ?int $standardSets = null,
        public ?string $statusTitle = null,
        public ?string $subjectIds = null,
        public ?int $subjects = null,
        public ?int $type = null,
        public ?string $typeCode = null,
        public ?string $typeName = null,
        public ?int $typeOrder = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
        public ?string $website = null,
    ) {
    }
}
