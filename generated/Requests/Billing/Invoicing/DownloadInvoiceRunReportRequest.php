<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Billing\Invoicing;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Gets a report with invoice details for the invoice run
 *
 * GET /api/billing/invoicing/invoiceruns/{id}/report
 */
class DownloadInvoiceRunReportRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/billing/invoicing/invoiceruns/'.rawurlencode((string) $this->id).'/report';
    }
}
