<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class DateRangeForCreate extends Data
{
    protected const LISTS = ['columns' => ScreeningLogColumnForCreate::class];

    /**
     * @param  Collection<int, ScreeningLogColumnForCreate>|null  $columns
     */
    public function __construct(
        public ?Collection $columns = null,
        public ?CarbonImmutable $endDate = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
