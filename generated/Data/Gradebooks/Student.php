<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Student extends Data
{
    protected const LISTS = ['columnMarks' => ColumnMark::class];

    /**
     * @param  Collection<int, ColumnMark>  $columnMarks
     */
    public function __construct(
        public Collection $columnMarks = new Collection,
        public ?bool $isDisassociated = null,
        public ?string $schoolId = null,
    ) {
    }
}
