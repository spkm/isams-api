<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroups;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class CustomPupilGroup extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $author = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?int $categoryId = null,
        public ?bool $shared = null,
        public ?bool $edit = null,
        public ?bool $deleted = null,
        public ?bool $hidden = null,
        public ?CarbonImmutable $expiryDate = null,
        public ?bool $expiryDisable = null,
        public ?CarbonImmutable $submitDateTime = null,
    ) {
    }
}
