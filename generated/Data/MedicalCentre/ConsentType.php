<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use spkm\IsamsApi\Data\Data;

readonly class ConsentType extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $defaultConsentAnswer = null,
        public ?bool $deleted = null,
        public ?string $name = null,
        public ?int $order = null,
        public ?bool $showToParents = null,
    ) {
    }
}
