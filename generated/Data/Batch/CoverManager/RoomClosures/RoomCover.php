<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\RoomClosures;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class RoomCover extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $roomId = null,
        public ?int $scheduleId = null,
        public ?int $creatorId = null,
        public ?int $authorId = null,
        public ?CarbonImmutable $date = null,
        public ?CarbonImmutable $created = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
