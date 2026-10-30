<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class AdmissionsVisitSummary extends Data
{
    public function __construct(
        public ?CarbonImmutable $endDate = null,
        public ?string $name = null,
        public ?CarbonImmutable $startDate = null,
        public ?string $type = null,
    ) {
    }
}
