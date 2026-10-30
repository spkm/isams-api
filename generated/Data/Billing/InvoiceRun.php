<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use spkm\IsamsApi\Data\Data;

readonly class InvoiceRun extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $amendmentCount = null,
        public ?string $name = null,
    ) {
    }
}
