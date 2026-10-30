<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ContactGroup extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public ?string $modifiedBy = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?string $name = null,
    ) {
    }
}
