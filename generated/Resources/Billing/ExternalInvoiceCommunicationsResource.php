<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Billing;

use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Billing\InvoiceCommunicationForUpdate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Billing\ExternalInvoiceCommunications\CreateExternalInvoiceCommunicationRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ExternalInvoiceCommunicationsResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Billing\InvoiceCommunicationForUpdate|array<string, mixed>  $data
     * @see \spkm\IsamsApi\Requests\Billing\ExternalInvoiceCommunications\CreateExternalInvoiceCommunicationRequest
     */
    public function create(int $invoiceId, MultipartValue $email, InvoiceCommunicationForUpdate|array $data): Created
    {
        return $this->fetch(new CreateExternalInvoiceCommunicationRequest(invoiceId: $invoiceId, email: $email, data: $data));
    }
}
