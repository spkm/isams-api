<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolManager\Terms;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Term extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $author = null,
        public ?int $schoolYear = null,
        public ?string $name = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $finishDate = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
