<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\DisciplineManager\DetentionsThisTerm;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Session extends BatchData
{
    protected const LISTS = ['pupils' => Pupil::class];

    /**
     * @param  Collection<int, Pupil>  $pupils
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?CarbonImmutable $starts = null,
        public ?CarbonImmutable $seriesStart = null,
        public ?CarbonImmutable $ends = null,
        public ?CarbonImmutable $seriesEnd = null,
        public ?int $recurrence = null,
        public ?CarbonImmutable $cutoff = null,
        public ?int $locationId = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $pupils = new Collection,
    ) {
    }
}
