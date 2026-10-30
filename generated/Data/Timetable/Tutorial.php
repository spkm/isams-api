<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Tutorial extends Data
{
    protected const LISTS = ['employees' => Employee::class];

    /**
     * @param  Collection<int, Employee>  $employees
     */
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public Collection $employees = new Collection,
        public ?string $name = null,
        public ?int $periodId = null,
    ) {
    }
}
