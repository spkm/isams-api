<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Billing\Invoicing;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Billing\InvoiceRunInvoice;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Gets details of invoices for an invoice run
 *
 * GET /api/billing/invoicing/invoiceruns/{id}/invoices
 */
class GetInvoiceRunInvoicesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = InvoiceRunInvoice::class;
    public string $resultKey = 'invoices';

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/billing/invoicing/invoiceruns/'.rawurlencode((string) $this->id).'/invoices';
    }
}
