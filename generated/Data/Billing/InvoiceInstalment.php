<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use spkm\IsamsApi\Data\Data;

readonly class InvoiceInstalment extends Data
{
    public function __construct(
        public ?string $instalmentNumber = null,
        public ?bool $isInstalment = null,
    ) {
    }
}
