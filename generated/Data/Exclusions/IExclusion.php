<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Exclusions;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Exclusions\Enums\IExclusionSessionStart;

readonly class IExclusion extends Data
{
    public function __construct(
        public ?int $afternoonSessions = null,
        public ?string $agencyInvolved = null,
        public ?CarbonImmutable $appealDate = null,
        public ?CarbonImmutable $appealReinstatementDate = null,
        public ?string $appealResult = null,
        public ?string $comments = null,
        public ?CarbonImmutable $committeeDate = null,
        public ?CarbonImmutable $committeeReinstatementDate = null,
        public ?string $committeeResult = null,
        public ?CarbonImmutable $endDate = null,
        public ?int $lunchtimeSessions = null,
        public ?int $morningSessions = null,
        public ?bool $parentRepresentation = null,
        public ?bool $partTime = null,
        public ?ExclusionReasonOne $reasonOne = null,
        public ?ExclusionReasonThree $reasonThree = null,
        public ?ExclusionReasonTwo $reasonTwo = null,
        public ?string $senProvision = null,
        public ?string $sessionStart = null,
        public ?CarbonImmutable $startDate = null,
        public ?string $studentId = null,
        public ?ExclusionType $type = null,
    ) {
    }

    public function sessionStartEnum(): ?IExclusionSessionStart
    {
        return IExclusionSessionStart::tryFrom((string) $this->sessionStart);
    }
}
