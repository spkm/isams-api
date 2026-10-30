<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use spkm\IsamsApi\Data\Data;

readonly class SchoolDivision extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $divisionCode = null,
        public ?string $divisionName = null,
    ) {
    }
}
