<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\DailyBulletin\TomorrowsDailyBulletins;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class LinkedDivision extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $divisionId = null,
        public ?int $authorId = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
