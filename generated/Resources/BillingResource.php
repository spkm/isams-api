<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\Billing\ExternalInvoiceCommunicationsResource;
use spkm\IsamsApi\Resources\Billing\ExternalInvoiceResource;
use spkm\IsamsApi\Resources\Billing\InvoicingResource;

class BillingResource extends BaseResource
{
    public function externalInvoiceCommunications(): ExternalInvoiceCommunicationsResource
    {
        return new ExternalInvoiceCommunicationsResource($this->connector);
    }

    public function externalInvoice(): ExternalInvoiceResource
    {
        return new ExternalInvoiceResource($this->connector);
    }

    public function invoicing(): InvoicingResource
    {
        return new InvoicingResource($this->connector);
    }
}
