<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Invoice extends Data
{
    public function __construct(
        public ?float $amount = null,
        public ?float $amountPaid = null,
        public ?float $amountRemaining = null,
        public ?float $amountRemainingAlt = null,
        public ?string $currency = null,
        public ?string $currencyAlt = null,
        public ?string $cycleName = null,
        public ?CarbonImmutable $cycleStart = null,
        public ?int $directDebitScheduleId = null,
        public ?CarbonImmutable $dueDate = null,
        public ?string $externalInvoiceId = null,
        public ?string $guid = null,
        public ?string $guidCentralFileServiceId = null,
        public ?InvoiceInstalment $instalment = null,
        public ?CarbonImmutable $invoiceDate = null,
        public ?int $invoiceId = null,
        public ?string $invoiceNumber = null,
        public ?bool $isAmendment = null,
        public ?bool $isCopyBill = null,
        public ?bool $isExternalAccountsProvider = null,
        public ?string $letterSalutation = null,
        public ?int $paymentStatusId = null,
        public ?string $pupilNames = null,
        public ?string $rate = null,
        public ?string $transactionId = null,
    ) {
    }
}
