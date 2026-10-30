<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\Structure;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Week extends BatchData
{
    protected const LISTS = ['days' => Day::class, 'divisions' => Division::class];

    /**
     * @param  Collection<int, Day>  $days
     * @param  Collection<int, Division>  $divisions
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $shortName = null,
        public ?int $ordinal = null,
        public ?bool $active = null,
        public ?bool $showTimetableWeek = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $days = new Collection,
        public Collection $divisions = new Collection,
    ) {
    }
}
