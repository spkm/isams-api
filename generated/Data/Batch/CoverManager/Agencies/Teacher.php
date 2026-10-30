<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\Agencies;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Teacher extends BatchData
{
    protected const LISTS = ['bookings' => Booking::class];

    /**
     * @param  Collection<int, Booking>  $bookings
     */
    public function __construct(
        public ?int $id = null,
        public ?string $teacher = null,
        public ?bool $preferred = null,
        public ?bool $archive = null,
        public ?string $notes = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $bookings = new Collection,
    ) {
    }
}
