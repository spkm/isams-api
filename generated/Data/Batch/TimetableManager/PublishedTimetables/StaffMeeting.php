<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\PublishedTimetables;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class StaffMeeting extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $periodId = null,
        public ?CarbonImmutable $validDate = null,
        public ?CarbonImmutable $cancellationDate = null,
        public ?int $roomId = null,
        public ?string $teacherId = null,
        public ?int $meetingGroupId = null,
        public ?string $meetingType = null,
        public ?string $displayName = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
