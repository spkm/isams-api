<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class StudentRecords extends Data
{
    protected const LISTS = ['records' => Record::class];

    /**
     * @param  Collection<int, Record>  $records
     */
    public function __construct(
        public Collection $records = new Collection,
        public ?string $schoolId = null,
    ) {
    }
}
