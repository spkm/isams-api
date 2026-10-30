<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Registration\Enums\StudentSelfRegistrationRegisterPeriodStatus;

readonly class StudentSelfRegistrationRegisterPeriod extends Data
{
    /**
     * @param  list<int>  $registrationIds
     */
    public function __construct(
        public ?CarbonImmutable $end = null,
        public array $registrationIds = [],
        public ?CarbonImmutable $start = null,
        public ?string $status = null,
        public ?string $subject = null,
        public ?string $takenByInitials = null,
        public ?string $teacher = null,
    ) {
    }

    public function statusEnum(): ?StudentSelfRegistrationRegisterPeriodStatus
    {
        return StudentSelfRegistrationRegisterPeriodStatus::tryFrom((string) $this->status);
    }
}
