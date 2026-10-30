<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Billing\Deposits\GetDepositBySchoolIdsRequest;

class BillingDepositsResource extends BaseResource
{
    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getDepositBySchoolIds(?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetDepositBySchoolIdsRequest($schoolIds));
    }
}
