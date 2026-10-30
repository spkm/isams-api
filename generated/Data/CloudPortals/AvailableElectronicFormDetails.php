<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class AvailableElectronicFormDetails extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $accessed = null,
        public ?string $description = null,
        public ?string $name = null,
        public ?bool $openEndDate = null,
        public ?int $remaining = null,
        public ?CarbonImmutable $shownFrom = null,
        public ?CarbonImmutable $shownUntil = null,
    ) {
    }
}
