<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class ReportMappingForCreate extends Data
{
    public function __construct(
        public ?string $allocation = null,
        public ?string $allocationType = null,
        public ?int $reportCycleId = null,
        public ?int $reportTemplateElementId = null,
    ) {
    }
}
