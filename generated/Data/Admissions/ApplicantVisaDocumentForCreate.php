<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use spkm\IsamsApi\Data\Data;

readonly class ApplicantVisaDocumentForCreate extends Data
{
    public function __construct(
        public string $name,
        public ?int $categoryId = null,
        public ?string $description = null,
        public ?string $filename = null,
    ) {
    }
}
