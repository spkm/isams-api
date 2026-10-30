<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class InternalExamSession extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?string $description = null,
        public ?CarbonImmutable $endDate = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
