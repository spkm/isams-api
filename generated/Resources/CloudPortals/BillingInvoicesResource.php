<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices\GetInvoiceDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices\GetInvoicesRequest;

class BillingInvoicesResource extends BaseResource
{
    public function getInvoiceDocument(string $centralFileServiceId): Response
    {
        return $this->connector->send(new GetInvoiceDocumentRequest($centralFileServiceId));
    }

    public function getInvoices(?bool $excludeCopyBills = null): Response
    {
        return $this->connector->send(new GetInvoicesRequest($excludeCopyBills));
    }
}
