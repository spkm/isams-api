<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\Structure;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Day extends BatchData
{
    protected const LISTS = ['periods' => Period::class];

    /**
     * @param  Collection<int, Period>  $periods
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $shortName = null,
        public ?int $day = null,
        public ?int $ordinal = null,
        public ?bool $active = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $periods = new Collection,
    ) {
    }
}
