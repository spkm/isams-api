<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class DateRange extends Data
{
    protected const LISTS = ['columns' => ScreeningLogColumn::class];

    /**
     * @param  Collection<int, ScreeningLogColumn>  $columns
     */
    public function __construct(
        public ?int $id = null,
        public Collection $columns = new Collection,
        public ?CarbonImmutable $endDate = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
