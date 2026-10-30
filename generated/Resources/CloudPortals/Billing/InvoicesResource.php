<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Billing;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices\GetInvoiceDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices\GetInvoicesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class InvoicesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Billing\Invoice>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices\GetInvoicesRequest
     */
    public function all(?bool $excludeCopyBills = null): Collection
    {
        return $this->fetch(new GetInvoicesRequest(excludeCopyBills: $excludeCopyBills));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices\GetInvoiceDocumentRequest
     */
    public function getDocument(string $centralFileServiceId): File
    {
        return $this->fetch(new GetInvoiceDocumentRequest(centralFileServiceId: $centralFileServiceId));
    }
}
