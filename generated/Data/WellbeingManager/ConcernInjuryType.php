<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class ConcernInjuryType extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $deleted = null,
        public ?bool $descriptionRequired = null,
        public ?string $name = null,
    ) {
    }
}
