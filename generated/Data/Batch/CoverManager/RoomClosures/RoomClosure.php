<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\RoomClosures;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class RoomClosure extends BatchData
{
    protected const LISTS = ['cover' => RoomCover::class];

    /**
     * @param  Collection<int, RoomCover>  $cover
     */
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $roomId = null,
        public ?int $closureReasonId = null,
        public ?int $startPeriodId = null,
        public ?int $endPeriodId = null,
        public ?int $authorId = null,
        public ?string $notes = null,
        public ?CarbonImmutable $startDateTime = null,
        public ?CarbonImmutable $endDateTime = null,
        public ?bool $periods = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $cover = new Collection,
    ) {
    }
}
