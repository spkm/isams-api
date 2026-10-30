<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Billing;

use spkm\IsamsApi\Requests\CloudPortals\Billing\PaymentGateway\GetPaymentGatewayPaymentProviderRequest;
use spkm\IsamsApi\Requests\CloudPortals\Billing\PaymentGateway\GetPaymentGatewayRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PaymentGatewayResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Billing\PaymentGateway\GetPaymentGatewayRequest
     */
    public function get(int $id): mixed
    {
        return $this->fetch(new GetPaymentGatewayRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Billing\PaymentGateway\GetPaymentGatewayPaymentProviderRequest
     */
    public function getProvider(): mixed
    {
        return $this->fetch(new GetPaymentGatewayPaymentProviderRequest());
    }
}
