<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\Timetable;

use spkm\IsamsApi\Batch\BatchData;

readonly class Pupils extends BatchData
{
    public function __construct(
        public ?Pupil $pupil = null,
    ) {
    }
}
