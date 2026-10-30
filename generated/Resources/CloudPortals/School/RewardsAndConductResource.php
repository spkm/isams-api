<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct\GetRewardsAndConductRewardTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct\GetRewardsAndConductRewardsByTypeRequest;

class RewardsAndConductResource extends BaseResource
{
    public function getByType(string $schoolId, int $typeId): Response
    {
        return $this->connector->send(new GetRewardsAndConductRewardsByTypeRequest($schoolId, $typeId));
    }

    public function getTypes(): Response
    {
        return $this->connector->send(new GetRewardsAndConductRewardTypesRequest());
    }
}
