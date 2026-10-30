<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Pupils extends BatchData
{
    protected const LISTS = ['pupil' => Pupil::class];

    /**
     * @param  Collection<int, Pupil>  $pupil
     */
    public function __construct(
        public Collection $pupil = new Collection,
    ) {
    }
}
