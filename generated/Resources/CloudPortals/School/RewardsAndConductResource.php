<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct\GetRewardsAndConductRewardTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct\GetRewardsAndConductRewardsByTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RewardsAndConductResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\Reward>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct\GetRewardsAndConductRewardsByTypeRequest
     */
    public function getByType(string $schoolId, int $typeId): Collection
    {
        return $this->fetch(new GetRewardsAndConductRewardsByTypeRequest(schoolId: $schoolId, typeId: $typeId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\RewardType>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct\GetRewardsAndConductRewardTypesRequest
     */
    public function getTypes(): Collection
    {
        return $this->fetch(new GetRewardsAndConductRewardTypesRequest());
    }
}
