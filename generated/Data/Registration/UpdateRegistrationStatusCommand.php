<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class UpdateRegistrationStatusCommand extends Data
{
    public function __construct(
        public ?int $absenceCodeId = null,
        public ?bool $isLate = null,
        public ?bool $isPresent = null,
        public ?CarbonImmutable $leavingOrLeftDateTime = null,
        public ?int $numberOfMinutesLate = null,
        public ?int $presentCodeId = null,
        public ?string $registrationComment = null,
    ) {
    }
}
