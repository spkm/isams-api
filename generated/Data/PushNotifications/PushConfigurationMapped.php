<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\PushNotifications;

use spkm\IsamsApi\Data\Data;

readonly class PushConfigurationMapped extends Data
{
    public function __construct(
        public ?bool $enabled = null,
    ) {
    }
}
