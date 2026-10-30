<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ExternalAccountsInvoiceForUpdate extends Data
{
    public function __construct(
        public ?float $amount = null,
        public ?float $amountRemaining = null,
        public ?string $currency = null,
        public ?CarbonImmutable $date = null,
        public ?float $discount = null,
        public ?CarbonImmutable $discountDate = null,
        public ?string $externalReference = null,
        public ?string $status = null,
    ) {
    }
}
