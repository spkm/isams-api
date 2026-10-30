<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Billing;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Billing\PaymentGateway\GetPaymentGatewayPaymentProviderRequest;
use spkm\IsamsApi\Requests\CloudPortals\Billing\PaymentGateway\GetPaymentGatewayRequest;

class PaymentGatewayResource extends BaseResource
{
    public function get(int $id): Response
    {
        return $this->connector->send(new GetPaymentGatewayRequest($id));
    }

    public function getProvider(): Response
    {
        return $this->connector->send(new GetPaymentGatewayPaymentProviderRequest());
    }
}
