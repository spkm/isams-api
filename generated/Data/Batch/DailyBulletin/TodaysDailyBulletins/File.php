<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\DailyBulletin\TodaysDailyBulletins;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class File extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $bulletinId = null,
        public ?int $authorId = null,
        public ?string $author = null,
        public ?string $guid = null,
        public ?string $name = null,
        public ?string $showFilename = null,
        public ?string $type = null,
        public ?string $description = null,
        public ?int $filesize = null,
        public ?string $directory = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
