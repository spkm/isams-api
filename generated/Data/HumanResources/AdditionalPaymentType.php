<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use spkm\IsamsApi\Data\Data;

readonly class AdditionalPaymentType extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $categoryCode = null,
        public ?string $name = null,
        public ?float $unitAmount = null,
        public ?bool $useAmount = null,
    ) {
    }
}
