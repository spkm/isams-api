<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\NewsManager\Categories;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Category extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $author = null,
        public ?string $type = null,
        public ?string $description = null,
        public ?bool $rss = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
