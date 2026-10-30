<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Billing\PaymentGateway\GetPaymentGatewayPaymentProviderRequest;
use spkm\IsamsApi\Requests\CloudPortals\Billing\PaymentGateway\GetPaymentGatewayRequest;

class BillingPaymentGatewayResource extends BaseResource
{
    public function getPaymentGateway(int $id): Response
    {
        return $this->connector->send(new GetPaymentGatewayRequest($id));
    }

    public function getPaymentGatewayPaymentProvider(): Response
    {
        return $this->connector->send(new GetPaymentGatewayPaymentProviderRequest());
    }
}
