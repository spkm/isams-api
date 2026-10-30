<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class InternalExamResult extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $additionalFields = null,
        public ?string $boardingHouse = null,
        public ?string $form = null,
        public ?string $grade = null,
        public ?int $mark = null,
        public ?string $paperCode = null,
        public ?string $paperName = null,
        public ?int $paperStatus = null,
        public ?string $programmeName = null,
        public ?int $totalMark = null,
        public ?int $year = null,
    ) {
    }
}
