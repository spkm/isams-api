<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class RegistrationStatus extends Data
{
    protected const LISTS = ['registrationNotes' => RegistrationStatusNote::class];

    /**
     * @param  Collection<int, RegistrationStatusNote>  $registrationNotes
     */
    public function __construct(
        public ?int $absenceCodeId = null,
        public ?bool $alertSent = null,
        public ?string $author = null,
        public ?bool $isFlaggedOutOfClass = null,
        public ?bool $isFutureAbsence = null,
        public ?bool $isLate = null,
        public ?bool $isOutOfSchool = null,
        public ?bool $isPresent = null,
        public ?int $isRegistered = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?CarbonImmutable $leavingOrLeftDateTime = null,
        public ?int $numberOfMinutesLate = null,
        public ?bool $parentNotificationSent = null,
        public ?int $presentCodeId = null,
        public ?string $registrationComment = null,
        public Collection $registrationNotes = new Collection,
        public ?int $registrationPeriodId = null,
        public ?string $schoolId = null,
    ) {
    }
}
