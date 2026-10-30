<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\Levels;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Level extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $curriculumId = null,
        public ?int $typeId = null,
        public ?float $academicHours = null,
        public ?bool $active = null,
        public ?string $activeTitle = null,
        public ?bool $attendance = null,
        public ?int $audits = null,
        public ?int $classes = null,
        public ?string $code = null,
        public ?bool $conference = null,
        public ?bool $core = null,
        public ?int $courses = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?float $credit = null,
        public ?int $curriculum = null,
        public ?string $curriculumCode = null,
        public ?int $curriculumModel = null,
        public ?string $curriculumModelCode = null,
        public ?string $curriculumModelName = null,
        public ?int $curriculumModelOrder = null,
        public ?string $curriculumName = null,
        public ?int $curriculumOrder = null,
        public ?bool $default = null,
        public ?string $defaultTitle = null,
        public ?string $description = null,
        public ?bool $droppable = null,
        public ?float $fee = null,
        public ?bool $graded = null,
        public ?string $guid = null,
        public ?int $metadata = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?bool $repeatable = null,
        public ?bool $required = null,
        public ?string $statusTitle = null,
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
