<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use spkm\IsamsApi\Data\Data;

readonly class AdmissionsFormOrchardFormFormDataForCreate extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $formCode = null,
        public ?string $guid = null,
        public ?string $name = null,
        public ?int $relatedId = null,
        public ?string $value = null,
    ) {
    }
}
