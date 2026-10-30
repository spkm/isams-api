<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class InvoiceRunInvoice extends Data
{
    protected const LISTS = ['invoiceItems' => InvoiceRunInvoiceItem::class];

    /**
     * @param  Collection<int, InvoiceRunInvoiceItem>  $invoiceItems
     */
    public function __construct(
        public ?int $id = null,
        public ?float $balanceBroughtForward = null,
        public ?InvoiceRunInvoiceContact $contact = null,
        public ?string $copyBillText = null,
        public ?string $currencyCode = null,
        public ?string $currencySymbol = null,
        public ?CarbonImmutable $invoiceCycleDueDate = null,
        public ?string $invoiceCycleName = null,
        public ?CarbonImmutable $invoiceCycleStartDate = null,
        public ?CarbonImmutable $invoiceDateTime = null,
        public Collection $invoiceItems = new Collection,
        public ?string $invoiceNote = null,
        public ?string $invoiceNumber = null,
        public ?CarbonImmutable $invoiceRunCompleteDateTime = null,
        public ?CarbonImmutable $invoiceRunDueDate = null,
        public ?string $payeeType = null,
        public ?InvoiceRunInvoicePupil $pupil = null,
        public ?int $schoolYear = null,
    ) {
    }
}
