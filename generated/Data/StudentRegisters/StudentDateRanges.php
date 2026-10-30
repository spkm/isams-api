<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class StudentDateRanges extends Data
{
    protected const LISTS = ['dateRanges' => DateRange::class];

    /**
     * @param  Collection<int, DateRange>  $dateRanges
     */
    public function __construct(
        public Collection $dateRanges = new Collection,
        public ?string $schoolId = null,
    ) {
    }
}
