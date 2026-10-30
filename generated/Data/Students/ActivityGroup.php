<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class ActivityGroup extends Data
{
    protected const LISTS = ['teachers' => ActivityTeacher::class];

    /**
     * @param  Collection<int, ActivityTeacher>  $teachers
     */
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?CarbonImmutable $endDate = null,
        public ?int $femaleCount = null,
        public ?string $folders = null,
        public ?int $maleCount = null,
        public ?string $name = null,
        public ?int $pupilCount = null,
        public ?string $reportName = null,
        public ?CarbonImmutable $startDate = null,
        public ?int $status = null,
        public Collection $teachers = new Collection,
    ) {
    }
}
