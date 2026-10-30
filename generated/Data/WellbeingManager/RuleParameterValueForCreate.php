<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class RuleParameterValueForCreate extends Data
{
    /**
     * @param  array<string, mixed>|null  $value
     */
    public function __construct(
        public ?string $name = null,
        public ?array $value = null,
    ) {
    }
}
