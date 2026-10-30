<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class LeaveRequest extends Data
{
    protected const LISTS = ['documents' => LeaveRequestDocument::class, 'students' => LeaveRequestStudent::class];

    /**
     * @param  Collection<int, LeaveRequestDocument>  $documents
     * @param  Collection<int, LeaveRequestStudent>  $students
     */
    public function __construct(
        public ?int $id = null,
        public Collection $documents = new Collection,
        public ?CarbonImmutable $endDateTime = null,
        public ?string $note = null,
        public ?string $parentUserCode = null,
        public ?CarbonImmutable $requestedOn = null,
        public ?string $schoolId = null,
        public ?CarbonImmutable $startDateTime = null,
        public Collection $students = new Collection,
        public ?string $type = null,
    ) {
    }
}
