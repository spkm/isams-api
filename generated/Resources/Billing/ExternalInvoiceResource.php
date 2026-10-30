<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Billing;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Billing\ExternalAccountsInvoiceForUpdate;
use spkm\IsamsApi\Requests\Billing\ExternalInvoice\UpdateExternalInvoiceDocumentRequest;
use spkm\IsamsApi\Requests\Billing\ExternalInvoice\UpdateExternalInvoiceRequest;

class ExternalInvoiceResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Billing\ExternalAccountsInvoiceForUpdate|array<string, mixed>  $externalAccountsInvoice
     */
    public function update(
        string $invoiceNumber,
        ExternalAccountsInvoiceForUpdate|array $externalAccountsInvoice,
    ): Response {
        return $this->connector->send(new UpdateExternalInvoiceRequest($invoiceNumber, $externalAccountsInvoice));
    }

    public function updateDocument(string $invoiceNumber, MultipartValue $document): Response
    {
        return $this->connector->send(new UpdateExternalInvoiceDocumentRequest($invoiceNumber, $document));
    }
}
