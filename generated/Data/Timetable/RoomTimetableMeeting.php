<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use spkm\IsamsApi\Data\Data;

readonly class RoomTimetableMeeting extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $displayName = null,
        public ?int $groupId = null,
        public ?int $periodId = null,
        public ?string $type = null,
    ) {
    }
}
