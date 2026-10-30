<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class TimetableDay extends Data
{
    protected const LISTS = ['periods' => Period::class, 'terms' => Term::class];

    /**
     * @param  Collection<int, Period>  $periods
     * @param  Collection<int, Term>  $terms
     */
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
        public ?int $number = null,
        public ?int $ordinal = null,
        public Collection $periods = new Collection,
        public ?string $shortName = null,
        public Collection $terms = new Collection,
    ) {
    }
}
