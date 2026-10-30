<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use spkm\IsamsApi\Data\CloudPortals\Enums\LeaveRequestStudentStatus;
use spkm\IsamsApi\Data\Data;

readonly class LeaveRequestStudent extends Data
{
    public function __construct(
        public ?string $fullName = null,
        public ?string $gender = null,
        public ?string $reason = null,
        public ?string $schoolId = null,
        public ?string $status = null,
        public ?string $surname = null,
    ) {
    }

    public function statusEnum(): ?LeaveRequestStudentStatus
    {
        return LeaveRequestStudentStatus::tryFrom((string) $this->status);
    }
}
