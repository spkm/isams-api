<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use spkm\IsamsApi\Data\Data;

readonly class InvoiceRunInvoiceItem extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?float $amount = null,
        public ?string $chargeCode = null,
        public ?string $chargeCodeDescription = null,
        public ?string $chargeType = null,
        public ?string $chargeTypeDescription = null,
        public ?int $count = null,
        public ?string $description = null,
        public ?string $nominalAccount = null,
        public ?string $order = null,
        public ?float $totalAmount = null,
        public ?float $vatAmount = null,
        public ?string $vatCode = null,
        public ?int $vatPercentage = null,
    ) {
    }
}
