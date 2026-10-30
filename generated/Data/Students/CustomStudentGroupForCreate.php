<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class CustomStudentGroupForCreate extends Data
{
    public function __construct(
        public int $category,
        public string $name,
        public ?string $description = null,
        public ?bool $editableByOthers = null,
        public ?CarbonImmutable $expiresOn = null,
        public ?bool $hidden = null,
        public ?bool $ignoreExpiryDate = null,
        public ?bool $shared = null,
    ) {
    }
}
