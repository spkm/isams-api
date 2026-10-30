<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use spkm\IsamsApi\Data\Data;

readonly class FieldCollection extends Data
{
    /**
     * @param  array<string, mixed>|null  $fields
     */
    public function __construct(
        public ?array $fields = null,
    ) {
    }
}
