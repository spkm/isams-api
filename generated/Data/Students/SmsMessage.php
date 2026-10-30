<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class SmsMessage extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $body = null,
        public ?string $mobile = null,
        public ?CarbonImmutable $sentOn = null,
    ) {
    }
}
