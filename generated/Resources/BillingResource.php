<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use spkm\IsamsApi\Resources\Billing\ExternalInvoiceCommunicationsResource;
use spkm\IsamsApi\Resources\Billing\ExternalInvoiceResource;
use spkm\IsamsApi\Resources\Billing\InvoicingResource;

class BillingResource extends IsamsResource
{
    public function externalInvoice(): ExternalInvoiceResource
    {
        return new ExternalInvoiceResource($this->connector);
    }

    public function externalInvoiceCommunications(): ExternalInvoiceCommunicationsResource
    {
        return new ExternalInvoiceCommunicationsResource($this->connector);
    }

    public function invoicing(): InvoicingResource
    {
        return new InvoicingResource($this->connector);
    }
}
