<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use spkm\IsamsApi\Data\Data;

readonly class AbsenceCode extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?int $displayOrder = null,
        public ?string $governmentCode = null,
        public ?string $governmentCodeName = null,
        public ?bool $isIncludedInStatistics = null,
        public ?bool $isOOSActive = null,
        public ?string $name = null,
    ) {
    }
}
