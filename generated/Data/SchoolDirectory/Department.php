<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SchoolDirectory;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Department extends Data
{
    protected const LISTS = ['staff' => Staff::class];

    /**
     * @param  Collection<int, Staff>  $staff
     */
    public function __construct(
        public ?int $departmentId = null,
        public Collection $staff = new Collection,
        public ?string $subjectName = null,
    ) {
    }
}
