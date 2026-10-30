<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\HumanResources\AdditionalPaymentTypes\GetAdditionalPaymentTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AdditionalPaymentTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\AdditionalPaymentType>
     * @see \spkm\IsamsApi\Requests\HumanResources\AdditionalPaymentTypes\GetAdditionalPaymentTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetAdditionalPaymentTypesRequest());
    }
}
