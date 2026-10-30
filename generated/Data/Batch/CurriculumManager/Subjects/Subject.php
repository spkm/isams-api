<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\Subjects;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Subject extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?bool $archived = null,
        public ?string $archivedTitle = null,
        public ?int $audits = null,
        public ?string $code = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?string $departmentIds = null,
        public ?int $departments = null,
        public ?string $description = null,
        public ?string $emailAddress = null,
        public ?string $headIds = null,
        public ?int $heads = null,
        public ?int $metadata = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?int $primaryDepartment = null,
        public ?string $primaryDepartmentCode = null,
        public ?string $primaryDepartmentName = null,
        public ?int $primaryDepartmentOrder = null,
        public ?string $statusTitle = null,
        public ?string $teacherIds = null,
        public ?int $teachers = null,
        public ?string $typeIds = null,
        public ?int $types = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
        public ?string $website = null,
    ) {
    }
}
