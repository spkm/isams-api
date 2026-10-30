<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class ReportMapping extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $allocationCode = null,
        public ?string $allocationName = null,
        public ?string $allocationType = null,
        public ?string $cycleName = null,
        public ?string $elementName = null,
        public ?int $reportCycleId = null,
        public ?int $reportTemplateElementId = null,
        public ?string $subjectName = null,
    ) {
    }
}
