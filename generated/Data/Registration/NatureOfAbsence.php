<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class NatureOfAbsence extends Data
{
    public function __construct(
        public ?string $code = null,
        public ?string $natureOfAbsence = null,
        public ?CarbonImmutable $registrationPeriod = null,
        public ?int $registrationPupilId = null,
        public ?string $schoolId = null,
    ) {
    }
}
