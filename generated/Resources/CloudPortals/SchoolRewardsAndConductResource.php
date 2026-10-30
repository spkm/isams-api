<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct\GetRewardsAndConductRewardTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct\GetRewardsAndConductRewardsByTypeRequest;

class SchoolRewardsAndConductResource extends BaseResource
{
    public function getRewardsAndConductRewardTypes(): Response
    {
        return $this->connector->send(new GetRewardsAndConductRewardTypesRequest());
    }

    public function getRewardsAndConductRewardsByType(string $schoolId, int $typeId): Response
    {
        return $this->connector->send(new GetRewardsAndConductRewardsByTypeRequest($schoolId, $typeId));
    }
}
