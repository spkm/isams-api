<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TeachingManager\SetLists;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class SetList extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $setId = null,
        public ?int $pupilId = null,
        public ?int $authorId = null,
        public ?string $schoolId = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
