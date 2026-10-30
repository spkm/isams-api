<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class ExamEntry extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $headerId = null,
        public ?string $headerName = null,
        public ?string $item = null,
        public ?string $level = null,
        public ?string $moduleCode = null,
        public ?string $programName = null,
        public ?string $qualification = null,
        public ?string $uabName = null,
    ) {
    }
}
