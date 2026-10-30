<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use spkm\IsamsApi\Resources\CloudPortals\Billing\DepositsResource;
use spkm\IsamsApi\Resources\CloudPortals\Billing\InvoicesResource;
use spkm\IsamsApi\Resources\CloudPortals\Billing\PaymentGatewayResource;
use spkm\IsamsApi\Resources\CloudPortals\Billing\StatementOfAccountsResource;
use spkm\IsamsApi\Resources\IsamsResource;

class BillingResource extends IsamsResource
{
    public function deposits(): DepositsResource
    {
        return new DepositsResource($this->connector);
    }

    public function invoices(): InvoicesResource
    {
        return new InvoicesResource($this->connector);
    }

    public function paymentGateway(): PaymentGatewayResource
    {
        return new PaymentGatewayResource($this->connector);
    }

    public function statementOfAccounts(): StatementOfAccountsResource
    {
        return new StatementOfAccountsResource($this->connector);
    }
}
