<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Pupil extends BatchData
{
    protected const LISTS = ['periods' => Period::class];

    /**
     * @param  Collection<int, Period>  $periods
     */
    public function __construct(
        public ?int $id = null,
        public Collection $periods = new Collection,
    ) {
    }
}
