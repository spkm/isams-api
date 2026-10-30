<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\RewardsAndConduct\Reward;
use spkm\IsamsApi\Data\RewardsAndConduct\RewardForCreate;
use spkm\IsamsApi\Data\RewardsAndConduct\RewardForUpdate;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\CreateRewardRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\GetRewardRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\GetRewardsRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\UpdateRewardRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RewardsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\RewardsAndConduct\Reward>
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\GetRewardsRequest
     */
    public function all(string $schoolId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetRewardsRequest(schoolId: $schoolId, filter: $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\RewardsAndConduct\RewardForCreate|array<string, mixed>  $reward
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\CreateRewardRequest
     */
    public function create(string $schoolId, RewardForCreate|array $reward): Created
    {
        return $this->fetch(new CreateRewardRequest(schoolId: $schoolId, reward: $reward));
    }

    /**
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\GetRewardRequest
     */
    public function get(string $schoolId, int $rewardId): Reward
    {
        return $this->fetch(new GetRewardRequest(schoolId: $schoolId, rewardId: $rewardId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\RewardsAndConduct\RewardForUpdate|array<string, mixed>  $reward
     * @see \spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\UpdateRewardRequest
     */
    public function update(string $schoolId, int $rewardId, RewardForUpdate|array $reward): bool
    {
        $this->fetch(new UpdateRewardRequest(schoolId: $schoolId, rewardId: $rewardId, reward: $reward));

        return true;
    }
}
