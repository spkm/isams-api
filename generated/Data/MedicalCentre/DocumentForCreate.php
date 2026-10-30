<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use spkm\IsamsApi\Data\Data;

readonly class DocumentForCreate extends Data
{
    public function __construct(
        public ?int $categoryId = null,
        public ?string $description = null,
        public ?int $documentSourceId = null,
        public ?string $name = null,
        public ?int $sensitivity = null,
    ) {
    }
}
