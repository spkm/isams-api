<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class ExamCycle extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $centreId = null,
        public ?string $centreName = null,
        public ?int $month = null,
        public ?int $resultsCount = null,
        public ?int $year = null,
    ) {
    }
}
