<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Billing\Invoicing;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Billing\InvoiceRun;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Gets a list of invoice runs for a cycle
 *
 * GET /api/billing/invoicing/cycles/{id}/invoiceruns
 */
class GetBillingCycleInvoiceRunsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = InvoiceRun::class;
    public string $resultKey = 'invoiceRuns';

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/billing/invoicing/cycles/'.rawurlencode((string) $this->id).'/invoiceruns';
    }
}
