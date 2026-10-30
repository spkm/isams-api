<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class ExamComponentResult extends Data
{
    public function __construct(
        public ?string $category = null,
        public ?string $componentCode = null,
        public ?string $componentTitle = null,
        public ?string $grade = null,
        public ?string $gradeCode = null,
        public ?string $gradeEndorsement = null,
        public ?string $moderatedCentreMark = null,
        public ?string $moderatedCentreMarkEndorsement = null,
        public ?string $scaledWeightedMark = null,
        public ?string $scaledWeightedMarkEndorsement = null,
        public ?string $status = null,
        public ?string $uniformMarkScale = null,
    ) {
    }
}
