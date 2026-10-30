<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class EmailMessage extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $author = null,
        public ?string $body = null,
        public ?string $subject = null,
        public ?CarbonImmutable $submittedOn = null,
    ) {
    }
}
