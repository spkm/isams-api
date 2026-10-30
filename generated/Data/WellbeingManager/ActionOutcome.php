<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class ActionOutcome extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $deleted = null,
        public ?bool $launchDetentionWizard = null,
        public ?string $name = null,
    ) {
    }
}
