<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Billing;

use spkm\IsamsApi\Data\Billing\DepositCollection;
use spkm\IsamsApi\Requests\CloudPortals\Billing\Deposits\GetDepositBySchoolIdsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DepositsResource extends IsamsResource
{
    /**
     * @param  array<mixed>|null  $schoolIds
     * @see \spkm\IsamsApi\Requests\CloudPortals\Billing\Deposits\GetDepositBySchoolIdsRequest
     */
    public function getBySchoolIds(?array $schoolIds = null): ?DepositCollection
    {
        return $this->fetch(new GetDepositBySchoolIdsRequest(schoolIds: $schoolIds));
    }
}
