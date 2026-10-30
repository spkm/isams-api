<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Billing;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Billing\InvoiceCommunicationForUpdate;
use spkm\IsamsApi\Requests\Billing\ExternalInvoiceCommunications\CreateExternalInvoiceCommunicationRequest;

class ExternalInvoiceCommunicationsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Billing\InvoiceCommunicationForUpdate|array<string, mixed>  $data
     */
    public function create(int $invoiceId, MultipartValue $email, InvoiceCommunicationForUpdate|array $data): Response
    {
        return $this->connector->send(new CreateExternalInvoiceCommunicationRequest($invoiceId, $email, $data));
    }
}
