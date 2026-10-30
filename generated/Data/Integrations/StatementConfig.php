<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations;

use spkm\IsamsApi\Data\Data;

readonly class StatementConfig extends Data
{
    public function __construct(
        public ?StatementDetailConfig $detail = null,
        public ?StatementHeaderConfig $header = null,
    ) {
    }
}
