<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\NewsManager\ActiveNews;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class File extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $filename = null,
        public ?string $fileShowName = null,
        public ?string $mimeType = null,
        public ?string $description = null,
        public ?int $size = null,
        public ?string $directory = null,
        public ?int $hitCount = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
