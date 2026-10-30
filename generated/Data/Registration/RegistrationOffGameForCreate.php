<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class RegistrationOffGameForCreate extends Data
{
    public function __construct(
        public ?bool $active = null,
        public ?CarbonImmutable $endDate = null,
        public ?bool $endDateProvided = null,
        public ?string $notes = null,
        public ?string $reason = null,
        public ?string $schoolId = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
