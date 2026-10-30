<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\Types;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Type extends BatchData
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
        public ?bool $default = null,
        public ?string $defaultTitle = null,
        public ?string $departmentIds = null,
        public ?int $departments = null,
        public ?string $description = null,
        public ?int $gpaSets = null,
        public ?int $gpaTypes = null,
        public ?int $gradeMarks = null,
        public ?int $gradeSets = null,
        public ?int $gradingSets = null,
        public ?int $gradingTemplates = null,
        public ?int $gradingTypes = null,
        public ?string $guid = null,
        public ?int $lengths = null,
        public ?int $metadata = null,
        public ?bool $module = null,
        public ?string $moduleId = null,
        public ?string $moduleImage = null,
        public ?string $moduleName = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?string $profileIds = null,
        public ?int $profiles = null,
        public ?int $standardItems = null,
        public ?int $standardSets = null,
        public ?string $statusTitle = null,
        public ?string $subjectIds = null,
        public ?int $subjects = null,
        public ?int $termSets = null,
        public ?int $termTypes = null,
        public ?string $type = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
        public ?string $userIds = null,
        public ?int $users = null,
    ) {
    }
}
