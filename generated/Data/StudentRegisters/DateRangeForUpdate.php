<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class DateRangeForUpdate extends Data
{
    protected const LISTS = ['columns' => ScreeningLogColumnForUpdate::class];

    /**
     * @param  Collection<int, ScreeningLogColumnForUpdate>|null  $columns
     */
    public function __construct(
        public ?Collection $columns = null,
        public ?CarbonImmutable $endDate = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
