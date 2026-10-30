<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\School;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Term extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $finishDate = null,
        public ?string $name = null,
        public ?int $schoolYear = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
