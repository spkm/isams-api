<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Visit extends Data
{
    protected const LISTS = ['attendances' => VisitApplicantContactAttendance::class];

    /**
     * @param  Collection<int, VisitApplicantContactAttendance>  $attendances
     */
    public function __construct(
        public ?int $id = null,
        public Collection $attendances = new Collection,
        public ?string $category = null,
        public ?CarbonImmutable $endDateTime = null,
        public ?string $name = null,
        public ?string $note = null,
        public ?CarbonImmutable $startDateTime = null,
    ) {
    }
}
