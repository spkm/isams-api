<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\HumanResources\AdditionalPaymentTypes\GetAdditionalPaymentTypesRequest;

class AdditionalPaymentTypesResource extends BaseResource
{
    public function getAdditionalPaymentTypes(): Response
    {
        return $this->connector->send(new GetAdditionalPaymentTypesRequest());
    }
}
