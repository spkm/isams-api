<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Billing;

use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Billing\ExternalAccountsInvoiceForUpdate;
use spkm\IsamsApi\Requests\Billing\ExternalInvoice\UpdateExternalInvoiceDocumentRequest;
use spkm\IsamsApi\Requests\Billing\ExternalInvoice\UpdateExternalInvoiceRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ExternalInvoiceResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Billing\ExternalAccountsInvoiceForUpdate|array<string, mixed>  $externalAccountsInvoice
     * @see \spkm\IsamsApi\Requests\Billing\ExternalInvoice\UpdateExternalInvoiceRequest
     */
    public function update(
        string $invoiceNumber,
        ExternalAccountsInvoiceForUpdate|array $externalAccountsInvoice,
    ): bool {
        $this->fetch(new UpdateExternalInvoiceRequest(invoiceNumber: $invoiceNumber, externalAccountsInvoice: $externalAccountsInvoice));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Billing\ExternalInvoice\UpdateExternalInvoiceDocumentRequest
     */
    public function updateDocument(string $invoiceNumber, MultipartValue $document): bool
    {
        $this->fetch(new UpdateExternalInvoiceDocumentRequest(invoiceNumber: $invoiceNumber, document: $document));

        return true;
    }
}
