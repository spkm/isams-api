<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class MarkCollectionForPatch extends Data
{
    protected const LISTS = ['students' => StudentForPatch::class];

    /**
     * @param  Collection<int, StudentForPatch>  $students
     */
    public function __construct(
        public Collection $students,
    ) {
    }
}
