<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class PortalExternalAccountFeatures extends Data
{
    public function __construct(
        public ?bool $useExternalInvoices = null,
        public ?bool $useInvoicesPartPayment = null,
    ) {
    }
}
