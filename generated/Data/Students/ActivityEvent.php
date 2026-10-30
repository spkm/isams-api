<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ActivityEvent extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $allDayEvent = null,
        public ?string $classroomCode = null,
        public ?string $classroomName = null,
        public ?CarbonImmutable $endDate = null,
        public ?string $groupCode = null,
        public ?string $groupName = null,
        public ?string $location = null,
        public ?string $name = null,
        public ?string $oppositionLocation = null,
        public ?string $pupilCount = null,
        public ?bool $resultScore = null,
        public ?bool $resultSummary = null,
        public ?bool $resultWinLoseDraw = null,
        public ?string $schoolName = null,
        public ?CarbonImmutable $startDate = null,
        public ?int $status = null,
        public ?int $subGroupId = null,
        public ?string $subGroupResultOppositionScore = null,
        public ?string $subGroupResultScore = null,
        public ?string $subGroupResultSummary = null,
        public ?int $subGroupResultWinLoseDraw = null,
    ) {
    }
}
