<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TeachingManager\Departments;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Subject extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?string $reportName = null,
        public ?bool $useForm = null,
        public ?bool $useSet = null,
        public ?bool $hidden = null,
        public ?bool $active = null,
        public ?string $website = null,
        public ?string $email = null,
        public ?int $customOrder = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
