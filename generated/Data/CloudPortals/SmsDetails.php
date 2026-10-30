<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use spkm\IsamsApi\Data\Data;

readonly class SmsDetails extends Data
{
    public function __construct(
        public ?string $mobileNumber = null,
    ) {
    }
}
