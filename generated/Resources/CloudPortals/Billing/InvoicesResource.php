<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Billing;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices\GetInvoiceDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices\GetInvoicesRequest;

class InvoicesResource extends BaseResource
{
    public function all(?bool $excludeCopyBills = null): Response
    {
        return $this->connector->send(new GetInvoicesRequest($excludeCopyBills));
    }

    public function getDocument(string $centralFileServiceId): Response
    {
        return $this->connector->send(new GetInvoiceDocumentRequest($centralFileServiceId));
    }
}
