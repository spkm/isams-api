<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class StudentForPatch extends Data
{
    protected const LISTS = ['columnMarks' => ColumnMarkForPatch::class];

    /**
     * @param  Collection<int, ColumnMarkForPatch>|null  $columnMarks
     */
    public function __construct(
        public string $schoolId,
        public ?Collection $columnMarks = null,
    ) {
    }
}
